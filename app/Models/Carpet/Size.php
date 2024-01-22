<?php

namespace App\Models\Carpet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    protected $table='carpet_sizes';

    protected $fillable=['size1','size2'];

    public function order()
    {
        return $this->hasMany(Order::class,'carpet_weaver_id');
    }

}
