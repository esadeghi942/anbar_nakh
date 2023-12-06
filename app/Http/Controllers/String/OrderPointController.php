<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\String\Color;
use App\Models\String\Grade;
use App\Models\String\Material;
use App\Models\String\OrderPoint;
use Illuminate\Http\Request;

class OrderPointController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colors=Color::all();
        $materials=Material::all();
        $grades=Grade::all();
        $order_points=OrderPoint::all();
        return view('string.order_point.index',compact('colors','materials','grades','order_points'));

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
        if(OrderPoint::where('string_color_id',$request->string_color_id)->where('string_material_id',$request->string_material_id)->where('string_grade_id',$request->string_grade_id)->exists())
            return redirect()->back()->withInput()->withErrors('نقطه سفارش با این مشخصات قبلا ثبت شده است.');
        OrderPoint::create($request->all());
        return redirect()->route('string.order_point.index')->with('success',trans('panel.success create',['item'=>trans('panel.order_point')]));

    }

    /**
     * Display the specified resource.
     */
    public function show(OrderPoint $orderPoint)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OrderPoint $orderPoint)
    {
        $colors=Color::all();
        $materials=Material::all();
        $grades=Grade::all();
        $item=$orderPoint;
        return view('string.order_point.edit',compact('colors','materials','grades','item'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OrderPoint $orderPoint)
    {
        if(OrderPoint::where('id','!=',$orderPoint->id)->where('string_color_id',$request->string_color_id)->where('string_material_id',$request->string_material_id)->where('string_grade_id',$request->string_grade_id)->exists())
            return redirect()->back()->withInput()->withErrors('نقطه سفارش با این مشخصات قبلا ثبت شده است.');

        $orderPoint->update($request->all());
        return redirect()->route('string.order_point.index')->with('success',trans('panel.success edit',['item'=>trans('panel.order_point')]));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OrderPoint $orderPoint)
    {
        //
    }
}
