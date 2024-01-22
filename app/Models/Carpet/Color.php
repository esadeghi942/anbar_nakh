<?php

namespace App\Models\Carpet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'carpet_colors';

    protected $fillable = ['name'];

    public function order()
    {
        return $this->hasMany(Order::class,'carpet_weaver_id');
    }

}
