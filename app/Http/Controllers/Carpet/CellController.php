<?php

namespace App\Http\Controllers\Carpet;

use App\Http\Controllers\Controller;
use App\Models\Anbar;
use App\Models\Cell;
use App\Models\Customer;
use Illuminate\Http\Request;

class CellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cells = Cell::all();
        return view('carpet.cell.index', compact('cells'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $anbars = Anbar::all();
        $customers = Customer::all();
        return view('carpet.cell.create', compact('anbars', 'customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Cell::create($request->all());
        return redirect()->route('carpet.cell.index')->with('success', trans('panel.success create', ['item' => trans('panel.cell')]));

    }

    /**
     * Display the specified resource.
     */
    public function show(Cell $cell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cell $cell)
    {
        $anbars = Anbar::all();
        $customers = Customer::all();
        return view('carpet.cell.edit', compact('anbars', 'customers', 'cell'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cell $cell)
    {
        $cell->update($request->all());
        return redirect()->route('carpet.cell.index')->with('success', trans('panel.success edit', ['item' => trans('panel.cell')]));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cell $cell)
    {
        if ($cell->qrCodes()->exists())
            return redirect()->route('carpet.cell.index')->withErrors('QR کدهایی از این سلول وجود دارد امکان حذف نیست.');
        $cell->delete();
        return redirect()->route('carpet.cell.index')->with('success', trans('panel.success delete', ['item' => trans('panel.cell')]));

    }
}
