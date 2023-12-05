<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function cell()
    {
        return $this->belongsTo(Cell::class);
    }

    public function anbar()
    {
        return $this->belongsTo(Anbar::class);
    }

    public function historyQrCodes()
    {
        return $this->hasMany(HistoryQrCode::class);
    }

    public function get_element(){

        $QR = $this->qr_codes;
        $QRcode = str_replace("#", "", $QR);
        $QRSeprated = (explode(".", $QRcode));
        if (count($QRSeprated) == 8) {
            $moshtary = $QRSeprated[0];
            $feature = $QRSeprated[4];
            foreach (range('A', 'Z') as $elements) {
                $feature = (str_replace($elements, "", $feature));
            }
            $Explain = (str_replace("-", "", $feature));
            $cells=Customer::where('code',$moshtary)->first()->cells();
        }
    }
}
