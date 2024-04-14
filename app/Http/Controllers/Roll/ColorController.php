<?php

namespace App\Http\Controllers\Roll;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Models\Roll\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors=Color::all();
        return view('roll.color.index',compact('colors'));
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
    public function store(PersonRequest $request)
    {
        Color::create($request->all());
        return redirect()->route('roll.color.index')->with('success', trans('panel.success create', ['item' => trans('panel.color')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Color $color)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Color $color)
    {
        $data=$color;
        return view('roll.color.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Color $color)
    {
        $color->update($request->all());
        return redirect()->route('roll.color.index')->with('success', trans('panel.success edit', ['item' => trans('panel.color')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('roll.color.index')->with('success', trans('panel.success delete', ['item' => trans('panel.color')]));
    }
}
