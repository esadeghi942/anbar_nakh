<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Models\String\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index()
    {
        $colors=Color::all();
        return view('string.color.index',compact('colors'));
    }

    public function create()
    {
        return view('string.color.create');

    }

    public function store(Request $request)
    {
        Color::create($request->all());
        return redirect()->route('string.color.index')->with('success',trans('panel.success create',['item'=> trans('panel.color')]));
    }

    public function edit(Color $color)
    {
        $data=$color;
        return view('string.color.edit',compact('data'));

    }

    public function update(Request $request,Color $color)
    {
        $color->update($request->all());
        return redirect()->route('string.color.index')->with('success',trans('panel.success edit',['item'=> trans('panel.color')]));
    }
    public function destroy(Request $request,Color $color)
    {
        if ($color->string_groups()->exists())
            return redirect()->route('string.color.index')->withErrors('مواردی از این رنگ در انبار وجود دارد امکان حذف نیست.');
        $color->delete();
        return redirect()->route('string.color.index')->with('success', trans('panel.success delete', ['item' => trans('panel.color')]));
    }
}
