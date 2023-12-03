<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Models\String\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials=Material::all();
        return view('string.material.index',compact('materials'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Material::create($request->all());
        return redirect()->route('string.material.index')->with('success',trans('panel.success create',['item'=>trans('panel.material')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        $data=$material;
        return view('string.material.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $material->update($request->all());
        return redirect()->route('string.material.index')->with('success',trans('panel.success edit',['item'=>trans('panel.material')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        //
    }
}
