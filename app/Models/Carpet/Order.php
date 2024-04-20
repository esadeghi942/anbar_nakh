<?php

namespace App\Models\Carpet;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='carpet_orders';

    protected $guarded = ['id'];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function map()
    {
        return $this->belongsTo(Map::class,'carpet_map_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class,'carpet_order_id');
    }

    public static $time_limits = [
        1,5,7,10,15,20,25,30,40,50,60
    ];

    public static $positions = [
        0   =>  'ندارد',
        1   =>  'BR(باریشه)',
        2   =>  'WR(بدون ریشه)',
        3   =>  'GM(مارک طلایی)',
        4   =>  'MM(مارک معمولی)',
        5   =>  'LC(لب چسب)',
        6   =>  'ZP(زیگ زاگ پنبه)',
        7   => 'ZM(زیگ زاگ معمولی)'
    ];

}
