<?php

namespace App\Models\String;

use App\Models\Seller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cell extends Model
{
    use HasFactory;

    protected $guarded=['id'];
    protected  $table='string_cells';

    public function string_items()
    {
        return $this->hasMany(Item::class,'string_cell_id');
    }

    public function string_anbar()
    {
        return $this->belongsTo(Anbar::class,'string_anbar_id');
    }

    public function seller()
    {
        return $this->belongsTo(Seller::class);
    }
}
