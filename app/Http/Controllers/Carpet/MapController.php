<?php

namespace App\Http\Controllers\Carpet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carpet\CarpetMapRequest;
use App\Models\Carpet\Map;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class MapController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $maps=Map::orderBy('id','desc')->simplePaginate(10);
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
            //$image->move(storage_path('images/uploads'), $fileName);
            $fileName=Storage::putFile('public/maps', $image);
            $data["image"] = trim($fileName,'public/maps/');
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
            $imagePath = storage_path('app/public/maps/'.$map->image);
            if (File::exists($imagePath)) {
                @unlink($imagePath);
            }
        }
        $image = $request->file('image');
        //$image->move(public_path('images/uploads'), $fileName);

        $fileName=Storage::putFile('public/maps', $image);
        $data["image"] = trim($fileName,'public/maps/');

        $map->update($data);
        return redirect()->route('carpet.map.index')->with('success', trans('panel.success edit', ['item' => trans('panel.map')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Map $map)
    {
       // $imagePath = public_path('images/uploads/'.$map->image);
        $imagePath = storage_path('app/public/maps/'.$map->image);
        if (File::exists($imagePath)) {
            unlink($imagePath);
        }
        $map->delete();
        return redirect()->route('carpet.map.index')->with('success', trans('panel.success delete', ['item' => trans('panel.map')]));
    }
}
