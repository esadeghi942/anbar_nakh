<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Models\String\Cell;
use App\Models\String\Enter;
use App\Models\String\StringGroup;
use Illuminate\Http\Request;

class StringGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $string_groups = StringGroup::all();
        return view('string.string_group.index', compact('string_groups'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StringGroup $stringGroup)
    {
        $item = $stringGroup;
        return view('string.string_group.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StringGroup $stringGroup)
    {
        $stringGroup->update($request->all());
        return redirect()->route('string.string_group.index')->with('success', trans('panel.success edit', ['item' => trans('panel.string_group')]));
    }

    public function destroy(StringGroup $stringGroup)
    {
        if ($stringGroup->string_enters()->exists())
            return redirect()->route('string.string_group.index')->withErrors('مواردی از این متریال در ورود به انبار وجود دارد امکان حذف نیست.');

        if ($stringGroup->string_exports()->exists())
            return redirect()->route('string.string_group.index')->withErrors('مواردی از این متریال در  خروج از انبار وجود دارد امکان حذف نیست.');

        if ($stringGroup->string_cells()->exists())
            return redirect()->route('string.string_group.index')->withErrors('مواردی از این متریال در انبار وجود دارد امکان حذف نیست.');

        $stringGroup->delete();
        return redirect()->route('string.string_group.index')->with('success', trans('panel.success delete', ['item' => trans('panel.string_group')]));
    }
}
