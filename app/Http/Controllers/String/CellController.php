<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Models\String\Anbar;
use App\Models\String\Cell;
use Illuminate\Http\Request;

class CellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anbars=Anbar::all();
        $cells=Cell::all();
        return view('string.cell.index',compact('cells','anbars'));
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
    public function store(Request $request)
    {
        Cell::create($request->all());
        return redirect()->route('string.cell.index')->with('success',trans('panel.success create',['item'=>trans('panel.cell')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Cell $cell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cell $cell)
    {
        $anbars=Anbar::all();
        return view('string.cell.edit',compact('cell','anbars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cell $cell)
    {
        $cell->update($request->all());
        return redirect()->route('string.cell.index')->with('success',trans('panel.success edit',['item'=>trans('panel.cell')]));


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cell $cell)
    {
        //
    }
}