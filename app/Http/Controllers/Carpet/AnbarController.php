<?php

namespace App\Http\Controllers\Carpet;

use App\Http\Controllers\Controller;
use App\Http\Requests\Carpet\AnbarRequest;
use App\Models\Anbar;
use Illuminate\Http\Request;

class AnbarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anbars=Anbar::all();
        return view('carpet.anbar.index',compact('anbars'));
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
    public function store(AnbarRequest $request)
    {
        Anbar::create($request->all());
        return redirect()->route('carpet.anbar.index')->with('success',trans('panel.success create',['item'=>trans('panel.anbar')]));

    }

    /**
     * Display the specified resource.
     */
    public function show(Anbar $anbar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Anbar $anbar)
    {
        return view('carpet.anbar.edit',compact('anbar'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnbarRequest $request, Anbar $anbar)
    {
        $anbar->update($request->all());
        return redirect()->route('carpet.anbar.index')->with('success',trans('panel.success edit',['item'=>trans('panel.anbar')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anbar $anbar)
    {
        //
    }
}
