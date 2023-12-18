<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $devices=Device::all();
        return view('device.index',compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request)
    {
        Device::create($request->all());
        return redirect()->route('device.index')->with('success',trans('panel.success create',['item'=>trans('panel.device')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Device $device)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        $data=$device;
        return view('device.edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Device $device)
    {
        $device->update($request->all());
        return redirect()->route('device.index')->with('success',trans('panel.success edit',['item'=>trans('panel.device')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        if ($device->string_experts()->exists())
            return redirect()->route('device.index')->withErrors('خروجی هایی از این دستگاه وجود دارد امکان حذف نیست.');
        $device->delete();
        return redirect()->route('device.index')->with('success', trans('panel.success delete', ['item' => trans('panel.device')]));

    }
}
