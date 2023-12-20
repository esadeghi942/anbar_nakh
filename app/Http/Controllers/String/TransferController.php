<?php

namespace App\Http\Controllers\String;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Http\Requests\String\TransferRequest;
use App\Models\String\Anbar;
use App\Models\String\Cell;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function index()
    {
        $anbars = Anbar::all();
        $cells = Cell::all();
        return view('string.transfer.index', compact('anbars', 'cells'));
    }

    public function save(TransferRequest $request)
    {
        $cell1 = Cell::find($request->cell1);
        $cell2 = Cell::find($request->cell2);

        if (!$cell1->string_group_id || !$cell1->weight)
            return redirect()->back()->withInput()->withErrors(' سلول مبدا حاوی هیچ متریالی نیست امکان جا به جایی وجود ندارد.');

        if ($cell2->string_group_id && $cell2->string_group_id !== $cell1->string_group_id)
            return redirect()->back()->withInput()->withErrors(' سلول مقصد حاوی متریال متفاوتی است امکان جا به جایی وجود ندارد.');

        $cell2->update(['string_group_id' => $cell1->string_group_id, 'weight' => $cell1->weight]);
        $cell1->update(['string_group_id' => null, 'weight' => 0]);

        return redirect()->back()->withInput()->with('success', 'جا به جایی با موفقیت انجام شد.');
    }
}
