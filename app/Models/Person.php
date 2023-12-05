<?php

namespace App\Models;

use App\Models\String\Export;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected $table='persons';

    public function string_experts()
    {
        return $this->hasMany(Export::class);
    }
}
