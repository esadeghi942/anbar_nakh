<?php

namespace App\Http\Controllers\Carpet;

use App\Http\Controllers\Controller;
use App\Models\Carpet\Map;
use App\Models\Carpet\Product;
use App\Models\Customer;
use App\Models\Carpet\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = Order::all();
        return view('carpet.order.index', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        $time_limits = Order::$time_limits;
        $carpet_maps = Map::all();
        $carpet_features = Order::$positions;
        return view('carpet.order.create', compact('customers', 'time_limits', 'carpet_maps', 'carpet_features'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $result = [];
        foreach ($data['carpet_product_feature'] as $item) {
            $result[] = Order::$positions[$item];
        }
        $carpet_product_feature = implode(',', $result);
        $order = Order::create([
            'customer_id' => $data['customer_id'],
            'user_id' => Auth::id(),
            'carpet_map_id' => $data['carpet_map_id'],
            'time_limit' => $data['time_limit'],
            'carpet_product_feature' => $carpet_product_feature,
        ]);

        foreach ($data['shape'] as $key => $shape) {
            $products = [
                'carpet_order_id' => $order->id,
                'shape' => $shape,
                'row' => $key + 1,
                'size1' => $data['size1'][$key],
                'size2' => $data['size2'][$key],
                'count' => $data['count'][$key],
                'area' => $this->calcute_area($shape, $data['count'][$key],$data['size1'][$key], $data['size2'][$key])
            ];
            $order->products()->create($products);
        }

        return redirect()->route('carpet.order.index')->with('success', __('panel.success done'));

    }

    private function calcute_area($shape, $count, $size1, $size2 = '')
    {
        $area = '';
        switch ($shape) {
            case 'مربع':
                $area = $size1 * $size1;
                break;
            case 'دایره':
                $r = $size1 / 2;
                $area = $r * $r * 3.14;
                break;
            case 'مستطیل':
                $area = $size1 * $size2;
                break;
            case 'بیضی':
                $r1 = $size1 / 2;
                $r2 = $size2 / 2;
                $area = $r1 * $r2 * 3.14;
                break;
        }
        return number_format($count * $area, 2);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        $time_limits = Order::$time_limits;
        $carpet_maps = Map::all();
        $carpet_features = Order::$positions;
        return view('carpet.order.show', compact('order', 'time_limits', 'carpet_maps', 'carpet_features'));
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
    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('carpet.order.index')->with('success', __('panel.success done'));
    }
}
