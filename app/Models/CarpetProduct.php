<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarpetProduct extends Model
{
    use HasFactory;

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
