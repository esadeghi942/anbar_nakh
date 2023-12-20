<?php

namespace App\Http\Controllers\String;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\String\Cell;
use App\Models\Device;
use App\Models\Person;
use App\Models\String\Anbar;
use App\Models\String\Color;
use App\Models\String\Grade;
use App\Models\String\Layer;
use App\Models\String\Material;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function index()
    {
        $anbars = Anbar::all();
        $cells = Cell::all();
        $colors = Color::all();
        $materials = Material::all();
        $grades = Grade::all();
        $layers = Layer::all();
        $sellers = Seller::all();
        return view('string.export.index', compact('anbars', 'layers', 'cells', 'colors', 'materials',
            'grades', 'sellers'));

    }

    public function search(Request $request)
    {

        $query = Cell::join('string_groups', 'string_cells.string_group_id', '=', 'string_groups.id')->selectRaw('string_cells.*');
        $title = [];
        if (isset($request->string_anbar_id)) {
            $query->where('string_anbar_id', $request->string_anbar_id);
            $title[] = ' انبار:' . Anbar::find($request->string_anbar_id)->name;
        }
        if (isset($request->string_cell_id)) {
            $query->where('string_cells.id', $request->string_cell_id);
            $title[] = ' سلول:' . Cell::find($request->string_cell_id)->name;
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

        $title = implode(',', $title);
        $items = $query->get();
        $devices = Device::all();
        $persons = Person::all();
        return view('string.export.search', compact('items', 'title', 'devices', 'persons'));
    }


    public function export(Request $request)
    {
        $item = Cell::find($request->id);
        if ($request->weight > $item->weight)
            return Response::error('مقدار وزن وارد شده از وزن موجود بیشتر است.');

        $item->string_exports()->create([
            'string_cell_id' => $item->id,
            'string_group_id' => $item->string_group_id,
            'device_id' => $request->device,
            'person_id' => $request->person,
            'weight' => $request->weight
        ]);

        $new_wight = $item->weight - $request->weight;
        if ($new_wight == 0)
            $item->update([
                'qr_code'=>null,
                'string_group_id'=>null,
                'weight'=>0
            ]);
        else
            $item->update(['weight' => $new_wight]);

        return Response::success();
    }
}
