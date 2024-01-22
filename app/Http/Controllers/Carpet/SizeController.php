<?php

namespace App\Http\Controllers\Carpet;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Carpet\Size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sizes=Size::all();
        return view('carpet.size.index',compact('sizes'));
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
        Size::create($request->all());
        return redirect()->route('carpet.size.index')->with('success', trans('panel.success create', ['item' => trans('panel.size')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Size $size)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Size $size)
    {
        $data=$size;
        return view('carpet.size.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Size $size)
    {
        $size->update($request->all());
        return redirect()->route('carpet.size.index')->with('success', trans('panel.success edit', ['item' => trans('panel.size')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Size $size)
    {
        $size->delete();
        return redirect()->route('carpet.size.index')->with('success', trans('panel.success delete', ['item' => trans('panel.size')]));
    }
}
