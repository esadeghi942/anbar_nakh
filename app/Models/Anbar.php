<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anbar extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function qrCodes()
    {
        return $this->hasMany(QrCode::class);
    }

    public function cells()
    {
        return $this->hasMany(Cell::class);
    }

}
