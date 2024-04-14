<?php

namespace App\Models\Carpet;

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

    public function products()
    {
        return $this->belongsTo(Product::class);
    }

    public static $time_limits = [
        1,5,7,10,15,20,25,30,40,50,60
    ];
}
