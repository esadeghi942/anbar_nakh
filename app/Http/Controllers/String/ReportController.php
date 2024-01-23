<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Person;
use App\Models\Seller;
use App\Models\String\Anbar;
use App\Models\String\Cell;
use App\Models\String\Color;
use App\Models\String\Grade;
use App\Models\String\GroupQrCode;
use App\Models\String\Layer;
use App\Models\String\Material;
use App\Models\String\QrCode;
use App\Models\String\QrCodeCell;
use App\Models\String\StringGroup;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function struct_cell()
    {
        $qr_code_qroups = QrCodeCell::groupBy('string_qr_code_id')->get();
        return view('string.report.struct_cell',compact('qr_code_qroups'));
    }

    public function index()
    {
        $anbars = Anbar::all();
        $cells = Cell::all();
        $colors = Color::all();
        $materials = Material::all();
        $grades = Grade::all();
        $layers = Layer::all();
        $sellers = Seller::all();
        return view('string.report.index', compact('anbars', 'layers', 'cells', 'colors', 'materials',
            'grades', 'sellers'));
    }

    public function search(Request $request)
    {

        $query = StringGroup::join('string_group_qr_codes', 'string_group_qr_codes.string_group_id', '=', 'string_groups.id')->join('string_qr_codes', 'string_qr_codes.string_group_qr_code_id', '=', 'string_group_qr_codes.id');
        $title = [];
       /* if (isset($request->string_anbar_id)) {
            $query->where('string_anbar_id', $request->string_anbar_id);
            $title[] = ' انبار:' . Anbar::find($request->string_anbar_id)->name;
        }
        if (isset($request->string_cell_id)) {
            $query->where('string_cells.id', $request->string_cell_id);
            $title[] = ' سلول:' . Cell::find($request->string_cell_id)->name;
        }*/
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
        if (isset($request->lat)) {
            $query->where('string_group_qr_codes.lat', $request->lat);
            $title[] = ' لات :' . $request->lat;
        }
        if (isset($request->seller)) {
            $query->where('string_group_qr_codes.seller_id', $request->seller);
            $title[] = ' تامین کننده :' . Seller::find($request->seller)->name;
        }
        $title = implode(',', $title);
        //dd($query->groupBy('string_groups.id')->selectRaw('string_groups.*,sum(string_qr_codes.weight) as total_weight')->get());
        $items = $query->groupBy('string_groups.id')->selectRaw('string_groups.*,sum(string_qr_codes.weight) as total_weight2')->get();
        $devices = Device::all();
        $persons = Person::all();
        return view('string.report.search', compact('items', 'title', 'devices', 'persons'));
    }
}
