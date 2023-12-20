<?php

namespace App\Http\Controllers;

use App\Models\String\Cell;
use App\Models\String\StringGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        //$order_pointer_string_groups = StringGroup::whereRaw('total_weight < order_pointer')->where('active', 1)->get();
        $order_pointer_string_groups =
            StringGroup::join('string_cells', 'string_groups.id', '=', 'string_cells.string_group_id')
                ->selectRaw('sum(string_cells.weight) as total_weight, string_groups.*')
                ->where('string_cells.string_group_id', '!=', 'null')
                ->groupBy('string_cells.string_group_id')
                ->havingRaw('total_weight < string_groups.order_pointer')
                ->whereRaw('string_groups.active=1')->get();
        $string_groups = StringGroup::where('active', 1)->get();
        $chart_data = [];
        foreach ($string_groups as $string_group) {
            $chart_data['label'][] = $string_group->title;
            $chart_data['total_weight'][] = $string_group->string_cells()->sum('weight');
            $chart_data['order_pointer'][] = $string_group->order_pointer;
        }
        $chart_data = json_encode($chart_data);

        return view('index', compact('string_groups', 'chart_data', 'order_pointer_string_groups'));
    }
}
