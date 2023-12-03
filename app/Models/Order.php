<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

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
}
