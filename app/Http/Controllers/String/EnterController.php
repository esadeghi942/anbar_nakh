<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;

use App\Http\Requests\ItemRequest;
use App\Models\Seller;
use App\Models\String\Anbar;
use App\Models\String\Cell;
use App\Models\String\Color;
use App\Models\String\Grade;
use App\Models\String\Enter;
use App\Models\String\Layer;
use App\Models\String\Material;
use App\Models\String\StringGroup;
use Illuminate\Http\Request;

class EnterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors = Color::all();
        $materials = Material::all();
        $sellers = Seller::all();
        $grades = Grade::all();
        $layers = Layer::all();
        $anbars = Anbar::all();
        $cells = Cell::all();
        return view('string.enter.create', compact('colors', 'materials', 'layers', 'sellers', 'grades', 'anbars', 'cells'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        $string_group = StringGroup::where('string_color_id', $request->string_color_id)->where('string_material_id', $request->string_material_id)->where('string_grade_id', $request->string_grade_id)->where('string_layer_id', $request->string_layer_id)->first();
        $cell = Cell::find($request->string_cell_id);
        $data1 = [
            'string_color_id' => $request->string_color_id,
            'string_material_id' => $request->string_material_id,
            'string_grade_id' => $request->string_grade_id,
            'string_layer_id' => $request->string_layer_id,
            'total_weight' => $request->weight,
            'order_pointer' => 0
        ];
        $data = $request->all();
        $qrcode = Enter::create_qr_codes($request->all());
        $data['qr_code'] = $qrcode;
        unset($data['string_color_id'], $data['string_material_id'], $data['string_grade_id']);
        if ($string_group) {
            if ($cell->string_group_id && $cell->string_group_id != $string_group->id)
                return redirect()->back()->withErrors('در این سلول متریال متفاوتی وجود دارد امکان اضافه کردن به این سلول نیست.')->withInput();
           else {
               $string_group->update(['total_weight' => $string_group->total_weight + $request->weight]);
               $enter = $string_group->string_enters()->create($data);
               $cell->update(['weight' => $cell->weight + $request->weight]);
               return redirect()->route('string.enter.show', $enter);
           }
        } else {
            if($cell->string_group_id == null) {
                $string_group = StringGroup::create($data1);
                $enter = $string_group->string_enters()->create($data);
                $cell->update(['weight' => $request->weight, 'string_group_id' => $string_group->id, 'qr_code' => $qrcode]);
                return redirect()->route('string.enter.show', $enter);
            }
            else
                return redirect()->back()->withErrors('در این سلول متریال متفاوتی وجود دارد امکان اضافه کردن به این سلول نیست.')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Enter $enter)
    {
        return view('string.enter.show', compact('enter'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Enter $enter)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Enter $enter)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Enter $enter)
    {
        //
    }
}
