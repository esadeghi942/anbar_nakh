<?php

namespace App\Http\Controllers\Carpet;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\PersonRequest;
use App\Models\Carpet\Weaver;
use Illuminate\Http\Request;

class WeaverController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('carpet.weaver.index');
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
        Weaver::create($request->all());
        return Response::success();
    }

    /**
     * Display the specified resource.
     */
    public function show(Weaver $weaver)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Weaver $weaver)
    {
        return view('carpet.weaver.edit',compact('weaver'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PersonRequest $request, Weaver $weaver)
    {
        $weaver->update($request->all());
        return Response::success();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Weaver $weaver)
    {
        $weaver->delete();
        return Response::success();
    }
}
