<?php

namespace App\Helpers;

class Functions
{
    public static function to_english_number($str)
    {
        $f = ['۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹', '۰'];
        $e = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '0'];
        return str_replace($f, $e, $str);
    }
}
