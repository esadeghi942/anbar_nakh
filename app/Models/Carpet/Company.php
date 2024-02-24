<?php

namespace App\Models\Carpet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table='companies';
    protected $fillable=['name'];

    public function factor()
    {
        return $this->hasMany(Factor::class);
    }

}

