<?php

namespace App\Http\Controllers\Carpet;

use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Models\Carpet\Device;
use Illuminate\Http\Request;

class DeviceControlle extends Controller
{
    public function index()
    {
        $devices=Device::all();
        return view('carpet.device.index',compact('devices'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request)
    {
        Device::create($request->all());
        return redirect()->route('carpet.device.index')->with('success', trans('panel.success create', ['item' => trans('panel.device')]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Device $device)
    {
        $data=$device;
        return view('carpet.device.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Device $device)
    {
        $device->update($request->all());
        return redirect()->route('carpet.device.index')->with('success', trans('panel.success edit', ['item' => trans('panel.device')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Device $device)
    {
        $device->delete();
        return redirect()->route('carpet.device.index')->with('success', trans('panel.success delete', ['item' => trans('panel.device')]));
    }
}
