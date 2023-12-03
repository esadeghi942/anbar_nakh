<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\String\Anbar;
use App\Models\String\Cell;
use App\Models\String\Color;
use App\Models\String\Grade;
use App\Models\String\Item;
use App\Models\String\Material;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items=Item::all();
        return view('string.item.index',compact('items'));

    }

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
    public function store(Request $request)
    {
        $data=$request->all();
        $qrcode=Item::create_qr_codes($request->all());
        $data['qr_code']=$qrcode;
        Item::create($data);
        return QrCode::generate($qrcode);
        return redirect()->route('string.item.index')->with('success',trans('panel.success create',['item'=>trans('panel.item')]));

    }

    public function get_qr_code(Item $item)
    {
        return view('string.item.qr_code', compact('item'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Item $item)
    {
        //
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
}
