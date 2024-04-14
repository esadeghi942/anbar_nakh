<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyControlle extends Controller
{
    public function index()
    {
        $companies=Company::all();
        return view('company.index',compact('companies'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(PersonRequest $request)
    {
        Company::create($request->all());
        return redirect()->route('company.index')->with('success', trans('panel.success create', ['item' => trans('panel.company')]));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Company $company)
    {
        $data=$company;
        return view('company.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Company $company)
    {
        $company->update($request->all());
        return redirect()->route('company.index')->with('success', trans('panel.success edit', ['item' => trans('panel.company')]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
        return redirect()->route('company.index')->with('success', trans('panel.success delete', ['item' => trans('panel.company')]));
    }

}
