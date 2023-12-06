<?php

namespace App\Http\Controllers\Carpet;

use App\Helpers\Response;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\QrCode;
use Illuminate\Http\Request;

class QrCodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(QrCode $qrCode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(QrCode $qrCode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, QrCode $qrCode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(QrCode $qrCode)
    {
        //
    }

    public function one()
    {
        return view('carpet.qr_code.one');
    }

    public function get_cell(Request $request)
    {
        $qr_code = $request->qrcode;
        if (QrCode::where('qr_codes', $qr_code)->exists())
            return Response::error('این کد QR  قبلا ثبت شده است.');
        $qr_code = str_replace('#', '', $qr_code);
        $QRSeprated = (explode(".", $qr_code));
        if (count($QRSeprated) == 8) {
            $moshtary = $QRSeprated[0];
            $customers = Customer::where('code', $moshtary)->first();
            if (!$customers)
                return Response::error('مشتری یافت نشد');
            $cells = $customers->cells()->get();
            $data['customer'] = $customers->name;
            $data['cells'] = [];
            foreach ($cells as $i => $cell) {
                $data['cells'][$i]['id'] = $cell->id;
                $data['cells'][$i]['anbar'] = $cell->anbar->name;
                $data['cells'][$i]['code'] = $cell->code;
            }
        } else
            return Response::error('فرمت کد QR صحیح نیست.');

        return $data;

    }
}
