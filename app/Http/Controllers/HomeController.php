<?php

namespace App\Http\Controllers;

use App\Models\String\Cell;
use App\Models\String\GroupQrCode;
use App\Models\String\StringGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        //$order_pointer_string_groups = StringGroup::whereRaw('total_weight < order_pointer')->where('active', 1)->get();
        $order_pointer_string_groups =
            StringGroup::join('string_group_qr_codes', 'string_groups.id', '=', 'string_group_qr_codes.string_group_id')
                ->join('string_qr_codes', 'string_group_qr_codes.id', '=', 'string_qr_codes.string_group_qr_code_id')
                ->selectRaw('sum(string_qr_codes.weight) as total_weight, string_groups.*')
                ->groupBy('string_group_qr_codes.string_group_id')
                ->havingRaw('total_weight < string_groups.order_pointer')
                ->whereRaw('string_groups.active=1')->get();

        $string_groups = StringGroup::where('active', 1)->get();
        $chart_data = [];
        foreach ($string_groups as $string_group) {
            $chart_data['label'][] = $string_group->title;
            $chart_data['total_weight'][] = intval($string_group->total_weight);
            $chart_data['order_pointer'][] = $string_group->order_pointer;
        }
        $chart_data = json_encode($chart_data);

        return view('index', compact('string_groups', 'chart_data', 'order_pointer_string_groups'));
    }

    public function add_up_cells()
    {
        /*for ($i = 0; $i < 9; $i++) {
            foreach (range('A', 'M') as $char) {
                $nameCellU = 'MU' . $char . sprintf('%02d', $i);
                Cell::create(['code' => $nameCellU, 'string_anbar_id' => 3]);
            }
        }

        for ($i = 11; $i < 16; $i++) {
            foreach (range('A', 'M') as $char) {
                $nameCellU = 'MU' . $char . sprintf('%02d', $i);
                Cell::create(['code' => $nameCellU, 'string_anbar_id' => 3]);

            }
        }*/
    }
}
