<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function struct_cell()
    {
        return view('string.report.struct_cell');
    }
}
