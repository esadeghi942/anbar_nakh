<?php

namespace App\Models\Carpet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='carpet_products';

    protected  $guarded=['id'];

    public function order()
    {
        return $this->belongsTo(Order::class,'carpet_order_id');
    }
}
