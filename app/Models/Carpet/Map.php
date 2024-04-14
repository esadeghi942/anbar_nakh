<?php

namespace App\Models\Carpet;

use App\Models\Roll\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $table = 'carpet_maps';

    const CARPET_MAP_PATH = '/images/map/';

    protected $fillable = ['name', 'image'];

    public function order()
    {
        return $this->hasMany(Order::class, 'carpet_map_id');
    }

    static function CarpetMapImagePath($filename)
    {
        return public_path('images\uploads\\' . $filename);
    }

}
