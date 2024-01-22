<?php

namespace App\Http\Controllers\Carpet;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Models\Carpet\Weaver;
use Illuminate\Http\Request;

class WeaverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $weavers = Weaver::all();
        return view('carpet.weaver.index', compact('weavers'));
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
        Weaver::create($request->all());
        return redirect()->route('weaver.index')->with('success',trans('panel.success create',['item'=> trans('panel.weaver')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Weaver $weaver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weaver $weaver)
    {
        $data = $weaver;
        return view('carpet.weaver.edit', compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Weaver $weaver)
    {
        $weaver->update($request->all());
        return redirect()->route('weaver.index')->with('success', trans('panel.success edit', ['item' => trans('panel.weaver')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weaver $weaver)
    {
        $weaver->delete();
        return redirect()->route('weaver.index')->with('success', trans('panel.success delete', ['item' => trans('panel.weaver')]));
    }
}
