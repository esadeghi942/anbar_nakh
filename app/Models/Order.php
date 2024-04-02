<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='carpet_orders';

    protected $guarded = ['id'];

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function kala()
    {
        return $this->belongsTo(Kala::class);
    }

    public function factor()
    {
        return $this->belongsTo(Factor::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public static $time_limits = [
        1,5,7,10,15,20,25,30,40,50,60
    ];
}
