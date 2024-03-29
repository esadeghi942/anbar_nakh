<?php

namespace App\Http\Controllers\String;

use App\Http\Controllers\Controller;
use App\Models\String\Anbar;
use App\Models\String\Cell;
use Illuminate\Http\Request;

class FreeController extends Controller
{
   /* public function free_total()
    {
        return view('string.free.total');
    }

       public function free_weight(Request $request)
    {
        $cells = Cell::where('string_group_id', '!=', 'null')->get();
        $result = [];
        foreach ($cells as $cell) {
            $data = [];
            $data['anbar'] = $cell->string_anbar->name;
            $data['cell'] = $cell->code;
            $data['material'] = $cell->string_group->title;
            $data['id'] = $cell->id;
            $result[] = $data;
        }
        return $result;
    }

   */

    public function free_one()
    {
        $anbars = Anbar::all();
        $cells = Cell::all();
        return view('string.free.one', compact('anbars', 'cells'));

    }


    public function free_one_search(Request $request)
    {
        $cell_id = isset($request->cell) ? $request->cell : 0;
        $cell = Cell::find($cell_id);
        $data['anbar'] = $cell->string_anbar->name;
        $data['cell'] = $cell->code;
        $data['material'] = $cell->string_group ? $cell->string_group->title : '';
        $data['id'] = $cell->id;
        $data['barcodes']= $cell->string_qr_codes()->get();
        return $data;
    }

  /*  public function free_total_save(Request $request)
    {
        foreach ($request->free as $cell_id) {
            Cell::find($cell_id)->update(['string_group_id' => null]);
        }
        return redirect()->back()->with('success', 'آزاد سازی با موفقیت انجام شد.');
    }*/

    public function free_one_save(Request $request)
    {
        $cell_id = isset($request->cell) ? $request->cell : 0;
        if ($cell_id) {
            $cell = Cell::find($cell_id);
            $cell->update(['string_group_id' => null]);
            $qr_codes= $cell->string_qr_codes()->get();
           /* foreach ($qr_codes as $qr_code){
                $group_qr_code=$qr_code->string_group_qr_code;
                $group_qr_code->string_exports()->create([
                    'string_group_id'=>$group_qr_code->string_group_id,
                    'weight'=>$qr_code->weight,
                    'serial'=>$qr_code->serial,
                ]);
            }*/
            $cell->string_qr_codes()->detach();
            return redirect()->back()->with('success', 'آزاد سازی با موفقیت انجام شد.');
        }
        return redirect()->back()->withErrors('سلول مورد نظر را وارد نمایید');
    }
}
