<?php

namespace App\Http\Controllers;

use App\Models\String\Item;
use App\Models\String\OrderPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user=Auth::user();
        $order_pointers=OrderPoint::all();
        $low=[];
        foreach ($order_pointers as $i=>$order_pointer) {
            $exist=Item::where('string_material_id',$order_pointer->string_material_id)
                ->where('string_color_id',$order_pointer->string_color_id)
                ->where('string_grade_id',$order_pointer->string_grade_id)->sum('rest_weight');

            if($exist < $order_pointer->value)
                $order_pointer->exists=$exist;
            else
                unset($order_pointers[$i]);

        }
        return view('index',compact('order_pointers'));
    }
}
