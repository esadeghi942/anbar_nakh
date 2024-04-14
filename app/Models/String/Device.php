<?php

namespace App\Models\String;

use App\Models\String\Export;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function string_experts()
    {
        return $this->hasMany(Export::class);
    }

}
