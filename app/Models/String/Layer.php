<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layer extends Model
{
    use HasFactory;

    protected $fillable = ['value'];

    protected  $table='string_layers';

    public function string_groups()
    {
        return $this->hasMany(StringGroup::class);
    }
}
