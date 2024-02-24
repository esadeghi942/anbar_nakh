<?php

namespace App\Http\Controllers\String;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Carpet\Company;
use App\Models\Device;
use App\Models\Person;
use App\Models\String\Anbar;
use App\Models\String\Cell;
use App\Models\Seller;
use App\Models\String\Color;
use App\Models\String\Grade;
use App\Models\String\GroupQrCode;
use App\Models\String\Layer;
use App\Models\String\Material;
use App\Models\String\QrCode;
use App\Models\String\StringGroup;
use Illuminate\Http\Request;

class GroupQrCodeController extends Controller
{
    public function index()
    {
        $anbars = Anbar::all();
        $cells = Cell::all();
        $group_qr_codes = GroupQrCode::where('type', 'label')->get();
        return view('string.qr_code.index', compact('group_qr_codes', 'anbars', 'cells'));

    }

    public function listt($type)
    {
        $anbars = Anbar::all();
        $cells = Cell::all();
        if ($type == 'label') {
            $group_qr_codes = GroupQrCode::where('type', 'label')->get();
            return view('string.qr_code.index', compact('group_qr_codes', 'anbars', 'cells'));
        } else {
            $group_qr_codes = GroupQrCode::where('type', '!=', 'label')->get();
            $persons = Person::all();
            $devices = Device::all();
            $companies=Company::all();

            return view('string.qr_code.list_weight', compact('group_qr_codes', 'anbars', 'cells','devices','persons','companies'));

        }
    }

    public function create()
    {
        $colors = Color::all();
        $materials = Material::all();
        $sellers = Seller::all();
        $grades = Grade::orderBy('value')->get();
        $layers = Layer::orderBy('value')->get();
        return view('string.qr_code.create', compact('colors', 'materials', 'sellers', 'grades', 'layers'));
    }

    public function store(Request $request)
    {
        /* $validated = $request->validate([
             'count' => 'required|numeric',
         ],['count'=>'تعداد']);*/
        $string_group = StringGroup::find_or_create($request->string_color_id, $request->string_material_id, $request->string_grade_id, $request->string_layer_id);
        $data = $request->all();
        unset($data['string_color_id'], $data['string_material_id'], $data['string_grade_id'], $data['string_layer_id']);
        $data['type'] = 'label';
        $group_qr_codes = $string_group->string_group_qr_codes()->create($data);

        for ($i = 1; $i <= $request->count; $i++) {
            $qrcode = $group_qr_codes->create_qr_codes($i);
            $group_qr_codes->string_qr_codes()->create(['serial' => $qrcode]);
        }

        return redirect()->route('string.group_qr_code.show', $group_qr_codes)->with('success', trans('panel.success done'));;
    }

    public function show(GroupQrCode $group_qr_code)
    {
        $qr_codes = $group_qr_code->string_qr_codes()->get();
        return view('string.qr_code.show', compact('qr_codes', 'group_qr_code'));
    }

    public function weight(GroupQrCode $group_qr_code)
    {
        $qr_codes = $group_qr_code->string_qr_codes()->get();
        return view('string.qr_code.weight', compact('qr_codes', 'group_qr_code'));

    }

    public function save_weight(Request $request, GroupQrCode $group_qr_code)
    {
        $qr_codes = $group_qr_code->string_qr_codes()->get();
        foreach ($qr_codes as $qr_code) {
            if (!empty($request->{'weight_' . $qr_code->id})) {
                $qr_code->update(['weight' => $request->{'weight_' . $qr_code->id}]);
            }
        }
        return redirect()->route('string.group_qr_code.index')->with('success', trans('panel.success done'));

    }

    public function enter()
    {
        $colors = Color::all();
        $materials = Material::all();
        $sellers = Seller::all();
        $grades = Grade::orderBy('value')->get();
        $layers = Layer::orderBy('value')->get();
        $anbars = Anbar::all();
        $cells = Cell::all();
        return view('string.qr_code.enter.create', compact('colors', 'materials', 'layers', 'sellers', 'grades', 'anbars', 'cells'));
    }

    public function search(Request $request)
    {
        $query = GroupQrCode::join('string_groups', 'string_group_qr_codes.string_group_id', '=', 'string_groups.id')->selectRaw('string_group_qr_codes.*')->where('type', 'label');
        $title = [];

        if (isset($request->string_material_id)) {
            $query->where('string_groups.string_material_id', $request->string_material_id);
            $title[] = ' جنس:' . Material::find($request->string_material_id)->name;
        }

        if (isset($request->string_material_id)) {
            $query->where('string_groups.string_material_id', $request->string_material_id);
            $title[] = ' جنس:' . Material::find($request->string_material_id)->name;
        }

        if (isset($request->string_color_id)) {
            $query->where('string_groups.string_color_id', $request->string_color_id);
            $title[] = ' رنگ:' . Color::find($request->string_color_id)->name;
        }

        if (isset($request->string_grade_id)) {
            $query->where('string_groups.string_grade_id', $request->string_grade_id);
            $title[] = ' نمره:' . Grade::find($request->string_grade_id)->value;
        }

        if (isset($request->string_layer_id)) {
            $query->where('string_groups.string_layer_id', $request->string_layer_id);
            $title[] = ' لا :' . Layer::find($request->string_layer_id)->value;
        }

        if (isset($request->seller)) {
            $query->where('string_group_qr_codes.seller_id', $request->seller);
            $title[] = ' تامین کننده :' . Seller::find($request->seller)->name;
        }

        if (isset($request->lat)) {
            $query->where('string_group_qr_codes.lat', $request->lat);
            $title[] = ' لات :' . $request->lat;
        }

        $title = implode(',', $title);
        $group_qr_codes = $query->get();
        $anbars = Anbar::all();
        $cells = Cell::all();
        return view('string.qr_code.enter.search', compact('group_qr_codes', 'title', 'anbars', 'cells'));
    }

    public function enter_cells(Request $request)
    {
        $groupQrCode = GroupQrCode::find($request->id);
        $qr_codes = $groupQrCode->string_qr_codes()->get();
        $cells = $request->cells;
        $errors = [];
        foreach ($cells as $cell) {
            $cc = Cell::find($cell);
            if ($cc->string_group_id != null && $cc->string_group_id !== $groupQrCode->string_group_id)
                return Response::error('حاوی متریال متفاوتی است امکان اضافه کردن به این سلول وجود ندارد.' . $cc->code . 'سلول');
        }

        foreach ($qr_codes as $qr_code) {
            if ($qr_code->string_cells()->count()) {
                $errors[] = "سریال $qr_code->serial قبلا در سلول  ثبت  شده امکان ورود مجدد نیست. ";
            } else
                $qr_code->string_cells()->sync($cells);

        }
        foreach ($cells as $cell) {
            $cc = Cell::find($cell);
            $cc->update(['string_group_id' => $groupQrCode->string_group_id]);
        }
        if (count($errors))
            return Response::error(implode('<br>', $errors));
        return Response::success();
    }

    public function exports(GroupQrCode $groupQrCode)
    {
        $exports=$groupQrCode->string_exports()->get();
        return view('string.qr_code.exports',compact('exports','groupQrCode'));
    }

}
