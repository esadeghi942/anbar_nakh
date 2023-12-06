<?php

namespace App\Http\Controllers\String;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Seller;
use App\Models\String\Cell;
use App\Models\Device;
use App\Models\Person;
use App\Models\String\Anbar;
use App\Models\String\Color;
use App\Models\String\Grade;
use App\Models\String\Item;
use App\Models\String\Material;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function index()
    {
        $anbars = Anbar::all();
        $cells = Cell::all();
        $colors = Color::all();
        $materials = Material::all();
        $grades = Grade::all();

        $sellers = Seller::all();
        return view('string.export.index', compact('anbars', 'cells', 'colors', 'materials',
            'grades', 'sellers'));

    }

    public function search(Request $request)
    {

        $query=Item::where('id','>',0);
        $title=[];
        if(isset($request->string_anbar_id)) {
            $query->where('string_anbar_id', $request->string_anbar_id);
            $title[]= ' انبار:'.Anbar::find($request->string_anbar_id)->name;
        }
        if(isset($request->string_cell_id)) {
            $query->where('string_cell_id', $request->string_cell_id);
            $title[]= ' سلول:'.Cell::find($request->string_cell_id)->name;
        }
        if(isset($request->string_material_id)) {
            $query->where('string_material_id', $request->string_material_id);
            $title[]= ' جنس:'.Material::find($request->string_material_id)->name;

        }
        if(isset($request->string_color_id)) {
            $query->where('string_color_id', $request->string_color_id);
            $title[]= ' رنگ:'.Color::find($request->string_color_id)->name;

        }
        if(isset($request->string_grade_id)) {
            $query->where('string_grade_id', $request->string_grade_id);
            $title[]= ' نمره:'.Grade::find($request->string_grade_id)->value;
        }
        if(isset($request->seller_id)) {
            $query->where('seller_id', $request->seller_id);
            $title[]= ' فروشنده:'.Seller::find($request->seller_id)->value;
        }
        $title=implode(',',$title);
        $items=$query->get();
        $devices=Device::all();
        $persons=Person::all();
        return view('string.export.search',compact('items','title','devices','persons'));
    }


    public function export(Request $request)
    {
        $item=Item::find($request->id);
        if($request->weight > $item->rest_weight)
            return Response::error('مقدار وزن وارد شده از وزن موجود بیشتر است.');

        $item->string_exports()->create([
           'device_id'=>$request->device,
            'person_id'=>$request->person,
            'weight'=>$request->weight
        ]);
        $rest_wight= $item->rest_weight;
        $item->update(['rest_weight'=> $rest_wight - $request->weight]);
        return Response::success();
    }
}