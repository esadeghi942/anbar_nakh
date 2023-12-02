<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function qrCodes()
    {
        return $this->hasMany(QrCode::class);
    }

    public function anbar()
    {
        return $this->belongsTo(Anbar::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
