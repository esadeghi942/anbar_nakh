<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradeRequest;
use App\Models\String\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades=Grade::orderBy('value')->get();
        return view('string.grade.index',compact('grades'));
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
    public function store(GradeRequest $request)
    {
        Grade::create($request->all());
        return redirect()->route('string.grade.index')->with('success',trans('panel.success create',['item'=>trans('panel.grade')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        return view('string.grade.edit',compact('grade'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GradeRequest $request, Grade $grade)
    {
        $grade->update($request->all());
        return redirect()->route('string.grade.index')->with('success',trans('panel.success edit',['item'=>trans('panel.grade')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        if ($grade->string_groups()->exists())
            return redirect()->route('string.grade.index')->withErrors('مواردی از این نمره در انبار وجود دارد امکان حذف نیست.');
        $grade->delete();
        return redirect()->route('string.grade.index')->with('success', trans('panel.success delete', ['item' => trans('panel.grade')]));

    }
}
