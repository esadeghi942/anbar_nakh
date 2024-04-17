<?php

namespace App\Models\Roll;

use App\Models\Carpet\Color;
use App\Models\Carpet\Map;
use App\Models\Carpet\Weaver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table='roll_orders';

    protected $guarded=['id'];

    public function factor()
    {
        return $this->belongsTo(Factor::class,'roll_factor_id');
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