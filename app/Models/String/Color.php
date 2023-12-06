<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $fillable = ['name','en_name'];

    protected  $table='string_colors';


    public function string_items()
    {
        return $this->hasMany(Item::class,'string_color_id');
    }
}
