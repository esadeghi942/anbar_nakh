<?php

namespace App\Http\Controllers\Carpet;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Models\Carpet\Color;
use App\Models\Carpet\Company;
use App\Models\Carpet\Device;
use App\Models\Carpet\Factor;
use App\Models\Carpet\Map;
use App\Models\Carpet\Size;
use App\Models\Carpet\Weaver;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FactorController extends Controller
{
    public function index()
    {

        $factors = Factor::orderBy('id','Desc')->get();
        return view('carpet.factor.index', compact('factors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $weavers=Weaver::all();
        $maps=Map::all();
        $colors=Color::all();
        $sizes=Size::all();
        $companies=Company::all();
        $devices=Device::all();
        return view('carpet.factor.create', compact('weavers', 'colors','maps','sizes','devices','companies'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $factor = Factor::create([
            'number' => $request->factor_number,
            'carpet_device_id' => $request->device,
            'carpet_company_id' => $request->company,
        ]);
        //$factor->setNumber();
        if (isset($request->number))
            foreach ($request->number as $i => $item) {
                if ($request->number[$i]) {
                    $order = [];
                    $order['date'] = Functions::to_english_number($request->date[$i]);
                    $order['number'] = $request->number[$i];
                    $order['carpet_weaver_id'] = $request->weavers[$i];
                    $order['carpet_color_id'] = $request->color[$i];
                    $order['carpet_map_id'] = $request->map[$i];
                    $order['carpet_size_id'] = $request->size[$i];
                    $order['number_carpet_board'] = $request->number_carpet_board[$i];

                    $order['number_roll_sleepy_on'] = $request->number_roll_sleepy_on[$i];
                    $order['weight_roll_sleepy_on'] = $request->weight_roll_sleepy_on[$i];
                    $order['number_roll_sleepy_below'] = $request->number_roll_sleepy_below[$i];
                    $order['weight_roll_sleepy_below'] = $request->weight_roll_sleepy_below[$i];
                    $factor->orders()->create($order);
                }
            }
        return redirect()->route('carpet.factor.index')->with('success', trans('panel.success create', ['item' => trans('panel.order')]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Factor $factor)
    {
        return view('carpet.factor.show',compact('factor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
/*    public function edit(Factor $factor)
    {
        $weavers=Weaver::all();
        $maps=Map::all();
        $colors=Color::all();
        $sizes=Size::all();
        return view('carpet.factor.edit', compact( 'weavers', 'colors', 'factor','maps','sizes'));
    }*/

    /**
     * Update the specified resource in storage.
     */
/*    public function update(Request $request, Factor $factor)
    {
        $factor->update([
            'user_id' => Auth::id(),
            'delivery_date' => Functions::to_english_number($request->delivery_date),
            'customer_id' => $request->customer_id
        ]);
        $factor->setNumber();
        if (isset($request->kalas))
            foreach ($request->kalas as $i => $item) {
                $order = [];
                $order['kala_id'] = $request->kalas[$i];
                $order['color_id'] = $request->color[$i];
                $order['unit_id'] = $request->unit[$i];
                $order['count'] = $request->count[$i];
                $order['status'] = $request->status[$i];
                $order['description'] = $request->description[$i];
                $factor->orders()->create($order);
            }
        if (isset($request->delete_orders))
            foreach ($request->delete_orders as $order) {
                Order::find($order) ? Order::find($order)->delete() : true;
            }
        foreach ($request->all() as $key=>$value){
            if(str_starts_with($key,'status_')){
                $id=explode('_',$key)[1];
                Order::find($id)->update(['status'=>$value]);
            }
        }
        return redirect()->route('carpet.factor.index')->with('success', trans('panel.success edit', ['item' => trans('panel.order')]));

    }*/

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Factor $factor)
    {
        $factor->delete();
        return redirect()->route('carpet.factor.index')->with('success', trans('panel.success delete', ['item' => trans('panel.order')]));
    }
}
