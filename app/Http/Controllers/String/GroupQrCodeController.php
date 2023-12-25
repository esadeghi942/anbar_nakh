<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Models\String\QrCode;
use App\Models\Seller;
use App\Models\String\Color;
use App\Models\String\Grade;
use App\Models\String\GroupQrCode;
use App\Models\String\Layer;
use App\Models\String\Material;
use App\Models\String\StringGroup;
use Illuminate\Http\Request;

class GroupQrCodeController extends Controller
{
    public function index()
    {
        $group_qr_codes = GroupQrCode::all();
        return view('string.qr_code.index', compact('group_qr_codes'));
    }

    public function create()
    {
        $colors = Color::all();
        $materials = Material::all();
        $sellers = Seller::all();
        $grades = Grade::all();
        $layers = Layer::orderBy('value')->get();
        return view('string.qr_code.create', compact('colors', 'materials', 'sellers', 'grades', 'layers'));
    }

    public function store(Request $request)
    {
        $string_group = StringGroup::where('string_color_id', $request->string_color_id)->where('string_material_id', $request->string_material_id)->where('string_grade_id', $request->string_grade_id)->where('string_layer_id', $request->string_layer_id)->first();
        if (!$string_group) {
            $data1 = [
                'string_color_id' => $request->string_color_id,
                'string_material_id' => $request->string_material_id,
                'string_grade_id' => $request->string_grade_id,
                'string_layer_id' => $request->string_layer_id,
                'order_pointer' => 0
            ];
            $string_group = StringGroup::create($data1);
        }
        $data = $request->all();
        unset($data['string_color_id'], $data['string_material_id'], $data['string_grade_id'], $data['string_layer_id']);
        $group_qr_codes = $string_group->string_group_qr_codes()->create($data);

        for ($i = 1; $i <= $request->count; $i++) {
            $qrcode = $group_qr_codes->create_qr_codes($i);
            $group_qr_codes->string_qr_codes()->create(['serial' => $qrcode]);
        }

        return redirect()->route('string.group_qr_code.show', $group_qr_codes)->with('success',trans('panel.success done'));;
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
                $qr_code->update(['weight' => $request->{'weight_' . $qr_code->id}, 'status' => 2]);
            }
        }
        return redirect()->route('string.group_qr_code.index')->with('success',trans('panel.success done'));

    }

}
