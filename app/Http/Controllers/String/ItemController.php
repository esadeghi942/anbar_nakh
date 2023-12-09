<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;

use App\Http\Requests\ItemRequest;
use App\Models\Seller;
use App\Models\String\Anbar;
use App\Models\String\Cell;
use App\Models\String\Color;
use App\Models\String\Grade;
use App\Models\String\Item;
use App\Models\String\Material;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $colors=Color::all();
        $materials=Material::all();
        $sellers=Seller::all();
        $grades=Grade::all();
        $anbars=Anbar::all();
        $cells=Cell::all();
        return view('string.item.create',compact('colors','materials','sellers','grades','anbars','cells'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ItemRequest $request)
    {
        $data=$request->all();
        $qrcode=Item::create_qr_codes($request->all());
        $data['qr_code']=$qrcode;
        $data['rest_weight']=$request->weight;
        $item=Item::create($data);
        return redirect()->route('string.item.show',$item);

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        return view('string.item.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        //
    }

    public function exports(Item $item)
    {
        $exports=$item->string_exports()->get();
        $title=[];
        $title[]= ' انبار:'.$item->string_anbar->name;
        $title[]= ' سلول:'.$item->string_cell->code;
        $title[]= ' جنس:'.$item->string_material->name;
        $title[]= ' رنگ:'.$item->string_color->name;
        $title[]= ' نمره:'.$item->string_grade->value;
        $title[]= ' فروشنده:'.$item->seller->name;
        $title=implode(', ' ,$title);
        return view('string.item.exports',compact('exports','title'));
    }
}
