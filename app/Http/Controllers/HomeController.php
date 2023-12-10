<?php

namespace App\Http\Controllers;

use App\Models\String\Item;
use App\Models\String\StringGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $order_pointer_string_groups = StringGroup::whereRaw('total_weight < order_pointer')->where('active', 1)->get();
        $string_groups = StringGroup::where('active', 1)->get();
        $chart_data = [];
        foreach ($string_groups as $i => $string_group) {
            $chart_data['label'][]=
                $string_group->string_color->name .
                $string_group->string_grade->value.
                $string_group->string_material->name.
                $string_group->string_layer->value;
            $chart_data['total_weight'][]=$string_group->total_weight;
            $chart_data['order_pointer'][]=$string_group->order_pointer;
        }

        $chart_data=json_encode($chart_data);

        return view('index', compact('string_groups','chart_data','order_pointer_string_groups'));
    }
}
