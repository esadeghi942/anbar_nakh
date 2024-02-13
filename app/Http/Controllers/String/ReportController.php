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
        return view('string.report.struct_cell', compact('qr_code_qroups'));
    }

    public function index()
    {
        $anbars = Anbar::all();
        $cells = Cell::all();
        $colors = Color::all();
        $materials = Material::all();
        $grades = Grade::orderBy('value')->get();
        $layers = Layer::orderBy('value')->get();
        $sellers = Seller::all();
        return view('string.report.index', compact('anbars', 'layers', 'cells', 'colors', 'materials',
            'grades', 'sellers'));
    }

    public function search(Request $request)
    {

        $query = GroupQrCode::join('string_groups', 'string_group_qr_codes.string_group_id', '=', 'string_groups.id')->join('string_qr_codes', 'string_qr_codes.string_group_qr_code_id', '=', 'string_group_qr_codes.id');
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
        $items = $query->groupBy('string_group_qr_codes.id')->selectRaw('string_group_qr_codes.*,sum(string_qr_codes.weight) as total_weight2')->get();
        $devices = Device::all();
        $persons = Person::all();
        return view('string.report.search', compact('items', 'title', 'devices', 'persons'));
    }


    public function total()
    {
        $materials = Material::all();
        $results = [];

        foreach ($materials as $material) {
            $query = StringGroup::join('string_group_qr_codes', 'string_group_qr_codes.string_group_id', '=', 'string_groups.id')->join('string_qr_codes', 'string_qr_codes.string_group_qr_code_id', '=', 'string_group_qr_codes.id')->where('string_groups.string_material_id', $material->id);
            $results[$material->name] = $query->groupBy('string_groups.string_material_id')->selectRaw('sum(string_qr_codes.weight) as total_weight2')->first();
        }
        return view('string.report.total', compact('results'));
    }

    public function search_in_cell()
    {
        $anbars = Anbar::all();
        $cells = Cell::all();
        return view('string.report.search_in_cell', compact('anbars', 'cells'));
    }

    public function result_search_in_cell(Request $request)
    {
        $cell_id = isset($request->cell) ? $request->cell : 0;
        $cell = Cell::find($cell_id);
        $data['anbar'] = $cell->string_anbar->name;
        $data['cell'] = $cell->code;
        $data['material'] = $cell->string_group ? $cell->string_group->title : '';
        $data['id'] = $cell->id;
        $barcodes=$cell->string_qr_codes()->get();
        foreach ($barcodes as $i=>$barcode){
            $data['barcodes'][$i]['cells']=$barcode->string_cells_code;
            $data['barcodes'][$i]['weight']=$barcode->weight;
            $data['barcodes'][$i]['serial']=$barcode->serial;
        }
        return $data;
    }

    public function anbar($anbar)
    {
        $query = QrCodeCell::
        join('string_cells', 'string_qr_code_cell.string_cell_id', '=', 'string_cells.id')
        ->join('string_anbars', 'string_cells.string_anbar_id', '=', 'string_anbars.id')->where('string_anbars.id',$anbar);
        $items = $query->groupBy('string_qr_code_cell.string_qr_code_id')->orderBy('string_cells.code')->pluck('string_qr_code_cell.string_qr_code_id')->toArray();
        return view('string.report.anbar', compact('items'));
    }
}
