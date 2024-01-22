<?php

namespace App\Http\Controllers\Carpet;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Models\Carpet\Map;
use App\Models\Person;
use Illuminate\Http\Request;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maps=Map::all();
        return view('carpet.map.index',compact('maps'));
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
        Map::create($request->all());
        return redirect()->route('carpet.map.index')->with('success', trans('panel.success create', ['item' => trans('panel.map')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Map $map)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Map $map)
    {
        $data=$map;
        return view('carpet.map.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Map $map)
    {
        $map->update($request->all());
        return redirect()->route('carpet.map.index')->with('success', trans('panel.success edit', ['item' => trans('panel.map')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Map $map)
    {
        $map->delete();
        return redirect()->route('carpet.map.index')->with('success', trans('panel.success delete', ['item' => trans('panel.map')]));
    }
}
