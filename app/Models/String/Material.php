<?php

namespace App\Models\String;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;
    protected $fillable = ['name','en_name'];

    protected  $table='string_materials';

    public function string_groups()
    {
        return $this->hasMany(StringGroup::class);
    }
}
