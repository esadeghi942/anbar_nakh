<?php

namespace App\Models\Carpet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='carpet_orders';

    protected $guarded=['id'];

    public function factor()
    {
        return $this->belongsTo(Factor::class,'carpet_factor_id');
    }

    public function weaver()
    {
        return $this->belongsTo(Weaver::class,'carpet_weaver_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class,'carpet_color_id');
    }

    public function map()
    {
        return $this->belongsTo(Map::class,'carpet_map_id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class,'carpet_size_id');
    }

}
