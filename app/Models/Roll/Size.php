<?php

namespace App\Models\Roll;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='roll_sizes';

    protected $fillable=['size1','size2'];

    public function order()
    {
        return $this->hasMany(Order::class,'carpet_weaver_id');
    }

}
