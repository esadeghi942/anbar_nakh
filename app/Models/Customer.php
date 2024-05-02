<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'test_customers';

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
