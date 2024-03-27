<?php

namespace App\Http\Controllers\Carpet;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\Carpet\CarpetMapRequest;
use App\Http\Requests\PersonRequest;
use App\Models\Carpet\Map;
use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
    public function store(CarpetMapRequest $request)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('images/uploads'), $fileName);
            $data["image"] = $fileName;
        }

        Map::create($data);
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
    public function update(CarpetMapRequest $request, Map $map)
    {
        $data = $request->validated();
        if ($request->hasFile('image')) {
            $imagePath = public_path('images/uploads/'.$map->image);
            if (File::exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $image = $request->file('image');
        $fileName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/uploads'), $fileName);
        $data["image"] = $fileName;

        $map->update($data);
        return redirect()->route('carpet.map.index')->with('success', trans('panel.success edit', ['item' => trans('panel.map')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Map $map)
    {
        $imagePath = public_path('images/uploads/'.$map->image);
        if (File::exists($imagePath)) {
            unlink($imagePath);
        }
        $map->delete();
        return redirect()->route('carpet.map.index')->with('success', trans('panel.success delete', ['item' => trans('panel.map')]));
    }
}
