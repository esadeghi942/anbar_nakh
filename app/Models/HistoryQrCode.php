<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryQrCode extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function qrCode()
    {
        return $this->belongsTo(QrCode::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
