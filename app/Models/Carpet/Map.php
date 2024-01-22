<?php

namespace App\Models\Carpet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $table='carpet_maps';

    protected $fillable=['name'];

    public function order()
    {
        return $this->hasMany(Order::class,'carpet_weaver_id');
    }

}
