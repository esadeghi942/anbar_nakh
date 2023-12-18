<?php

namespace App\Http\Controllers;

use App\Http\Requests\ColorRequest;
use App\Http\Requests\CustomerRequest;
use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sellers=Seller::all();
        return view('seller.index',compact('sellers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('seller.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ColorRequest $request)
    {
        Seller::create($request->all());
        return redirect()->route('seller.index')->with('success',trans('panel.success create',['item'=>trans('panel.seller')]));

    }

    /**
     * Display the specified resource.
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Seller $seller)
    {
        $data=$seller;
        return view('seller.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColorRequest $request, Seller $seller)
    {
        $seller->update($request->all());
        return redirect()->route('seller.index')->with('success',trans('panel.success create',['item'=>trans('panel.seller')]));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Seller $seller)
    {
        if ($seller->string_item()->exists())
            return redirect()->route('seller.index')->withErrors('موجودی هایی از این تامین کننده وجود دارد امکان حذف نیست.');
        $seller->delete();
        return redirect()->route('seller.index')->with('success', trans('panel.success delete', ['item' => trans('panel.seller')]));

    }
}
