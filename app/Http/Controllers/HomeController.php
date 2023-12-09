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
        $string_groups=StringGroup::whereRaw('total_weight < order_pointer')->where('active',1)->get();
        return view('index',compact('string_groups'));
    }
}
