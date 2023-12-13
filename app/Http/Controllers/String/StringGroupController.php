<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
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
        $string_groups=StringGroup::all();
        return view('string.string_group.index',compact('string_groups'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StringGroup $stringGroup)
    {
        $item=$stringGroup;
        return view('string.string_group.edit',compact('item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StringGroup $stringGroup)
    {
        $stringGroup->update($request->all());
        return redirect()->route('string.string_group.index')->with('success',trans('panel.success edit',['item'=>trans('panel.string_group')]));
    }
}
