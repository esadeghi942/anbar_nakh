<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Http\Requests\AnbarRequest;
use App\Models\String\Anbar;
use Illuminate\Http\Request;

class AnbarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $anbars = Anbar::all();
        return view('string.anbar.index', compact('anbars'));
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
        return redirect()->route('string.anbar.index')->with('success', trans('panel.success create', ['item' => trans('panel.anbar')]));

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
        return view('string.anbar.edit', compact('anbar'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AnbarRequest $request, Anbar $anbar)
    {
        $anbar->update($request->all());
        return redirect()->route('string.anbar.index')->with('success', trans('panel.success edit', ['item' => trans('panel.anbar')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Anbar $anbar)
    {
        if ($anbar->string_cells()->exists())
            return redirect()->route('string.anbar.index')->withErrors('مواردی از این انبار در انبار وجود دارد امکان حذف نیست.');
        $anbar->delete();
        return redirect()->route('string.anbar.index')->with('success', trans('panel.success delete', ['item' => trans('panel.anbar')]));
    }
}
