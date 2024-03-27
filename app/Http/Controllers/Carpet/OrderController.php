<?php

namespace App\Http\Controllers\Carpet;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('carpet.order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('carpet.order.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newData = [];

        foreach ($data['shape'] as $key => $shape) {
            $newData[] = [
                'shape' => $shape,
                'size' => $data['size'][$key],
                'number' => $data['number'][$key],
                'length' => $data['length'][$key],
                'width' => $data['width'][$key],
            ];
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
