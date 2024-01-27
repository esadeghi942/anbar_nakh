<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Http\Requests\ItemRequest;
use App\Models\Seller;
use App\Models\String\Anbar;
use App\Models\String\Cell;
use App\Models\String\Color;
use App\Models\String\Grade;
use App\Models\String\Layer;
use App\Models\String\Material;
use App\Models\String\StringGroup;
use Illuminate\Http\Request;

class EnterController extends Controller
{
    public function create()
    {
        $colors = Color::all();
        $materials = Material::all();
        $sellers = Seller::all();
        $grades = Grade::orderBy('value')->get();
        $layers = Layer::orderBy('value')->get();
        $anbars = Anbar::all();
        $cells = Cell::all();
        return view('string.enter.create', compact('colors', 'materials', 'layers', 'sellers', 'grades', 'anbars', 'cells'));
    }

    /**
     *  just store string with weight
     */
    public function store(ItemRequest $request)
    {
        $string_group=StringGroup::find_or_create($request->string_color_id,$request->string_material_id, $request->string_grade_id, $request->string_layer_id);
        $cells = $request->cells;
        foreach ($cells as $cell) {
            $cc = Cell::find($cell);
            if ($cc->string_group_id != null && $cc->string_group_id !== $string_group->id)
                return redirect()->back()->withErrors('حاوی متریال متفاوتی است امکان اضافه کردن به این سلول وجود ندارد.' . $cc->code . 'سلول')->withInput();
        }

        $data = $request->all();
        unset($data['string_color_id'], $data['string_material_id'], $data['string_grade_id'], $data['string_layer_id']);
        $data['count'] = 1;
        $data['initial_weight'] = $request->weight;
        //$data['string_cells'] = implode(',', $request->cells);

        $group_qr_code = $string_group->string_group_qr_codes()->create($data);
        //1 beacouse count we need 1 qr_code
        $serial = $group_qr_code->create_qr_codes(1);
        $qr_code=$group_qr_code->string_qr_codes()->create(['serial' => $serial, 'weight' => $request->weight]);
        $qr_code->string_cells()->sync($cells);

        foreach ($cells as $cell) {
            $cc = Cell::find($cell);
            $cc->update(['string_group_id' => $string_group->id]);
        }
        return redirect()->back()->with('success','عملیات با موفقیت انجام شد.');
    }

}
