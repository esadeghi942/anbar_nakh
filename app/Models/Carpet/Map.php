<?php

namespace App\Models\Carpet;

use App\Models\Roll\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Map extends Model
{
    use HasFactory;

    protected $table = 'test_maps';

    const CARPET_MAP_PATH = 'test_maps';

    protected $fillable = ['name', 'image'];

    public function order()
    {
        return $this->hasMany(Order::class, 'carpet_map_id');
    }

    public function getImagePathAttribute()
    {
        return asset(env('BASE_STORAGE_PATH').'storage/'.Map::CARPET_MAP_PATH).'/'.$this->image;
       // return asset('storage/'.Map::CARPET_MAP_PATH).'/'.$this->image;

    }

}
