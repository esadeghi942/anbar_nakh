<?php

namespace App\Models;

use App\Models\String\Enter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seller extends Model
{
    use HasFactory;

    protected $guarded=['id'];

    public function string_item()
    {
        return $this->hasMany(Enter::class);
    }

}
