<?php

namespace App\Http\Controllers\Carpet;

use App\Http\Controllers\Controller;
use App\Models\Carpet\Map;
use App\Models\Carpet\Product;
use App\Models\Customer;
use App\Models\Carpet\Order;
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
        $customers = Customer::all();
        $time_limits = Order::$time_limits;
        $carpet_maps = Map::all();
        $carpet_features = Product::$positions;
        return view('carpet.order.create',compact('customers','time_limits','carpet_maps','carpet_features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        $data = $request->all();
        $size_carpet_product = [];

        foreach ($data['shape'] as $key => $shape) {
            $size_carpet_product[] = [
                'shape' => $shape,
                'size' => $data['size'][$key],
            ];
        }

        dd($size_carpet_product);

        Order::create([
            'customer_id' => $data['customer_id'],
            'carpet_map_id' => $data['carpet_map_id'],
            'time_limit' => $data['time_limit'],
            'carpet_product_feature' => json_encode($data['carpet_product_feature']),
        ]);

        return redirect()->route('carpet.order.create');

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
