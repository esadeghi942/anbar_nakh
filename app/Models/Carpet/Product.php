<?php

namespace App\Models\Carpet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table='carpet_products';

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
