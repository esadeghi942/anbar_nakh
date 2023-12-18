<?php

namespace App\Http\Controllers;

use App\Http\Requests\PersonRequest;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons=Person::all();
        return view('person.index',compact('persons'));

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
    public function store(PersonRequest $request)
    {
        Person::create($request->all());
        return redirect()->route('person.index')->with('success',trans('panel.success create',['item'=>trans('panel.person')]));

    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person)
    {
        $data=$person;
        return view('person.edit',compact('data'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Person $person)
    {
        $person->update($request->all());
        return redirect()->route('person.index')->with('success',trans('panel.success edit',['item'=>trans('panel.person')]));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Person $person)
    {
        if ($person->string_experts()->exists())
            return redirect()->route('person.index')->withErrors('خروجی هایی از این شخص وجود دارد امکان حذف نیست.');
        $person->delete();
        return redirect()->route('person.index')->with('success', trans('panel.success delete', ['item' => trans('panel.person')]));
    }
}
