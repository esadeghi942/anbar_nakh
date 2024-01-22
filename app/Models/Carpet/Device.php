<?php

namespace App\Models\Carpet;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $table='carpet_devices';

    protected $fillable=['name'];

    public function factor()
    {
        return $this->hasMany(Factor::class);
    }


}
