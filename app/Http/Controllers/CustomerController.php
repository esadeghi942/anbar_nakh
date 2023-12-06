<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers=Customer::all();
        return view('customer.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
        Customer::create($request->all());
        return redirect()->route('customer.index')->with('success',trans('panel.success create',['item'=>trans('panel.customer')]));

    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        return view('customer.edit',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->all());
        return redirect()->route('customer.index')->with('success',trans('panel.success create',['item'=>trans('panel.customer')]));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        if ($customer->cells()->exists())
            return redirect()->route('customer.index')->withErrors('سلول هایی از این مشتری وجود دارد امکان حذف نیست.');
        if ($customer->qrCodes()->exists())
            return redirect()->route('customer.index')->withErrors('QR کدهایی از این مشتری وجود دارد امکان حذف نیست.');
        $customer->delete();
        return redirect()->route('customer.index')->with('success', trans('panel.success delete', ['item' => trans('panel.customer')]));

    }
}
