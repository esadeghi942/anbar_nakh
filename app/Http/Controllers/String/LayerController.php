<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Models\String\Layer;
use Illuminate\Http\Request;

class LayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layers=Layer::all();
        return view('string.layer.index',compact('layers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GradeRequest $request)
    {
        Layer::create($request->all());
        return redirect()->route('string.layer.index')->with('success',trans('panel.success create',['item'=>trans('panel.layer')]));

    }

    /**
     * Display the specified resource.
     */
    public function show(Layer $layer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layer $layer)
    {
        return view('string.layer.edit',compact('layer'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradeRequest $request, Layer $layer)
    {
        $layer->update($request->all());
        return redirect()->route('string.layer.index')->with('success',trans('panel.success edit',['item'=>trans('panel.layer')]));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layer $layer)
    {
        //
    }
}
