<?php

namespace App\Models;

use App\Models\Roll\Factor;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table='companies';
    protected $fillable=['name'];

    public function factor()
    {
        return $this->hasMany(Factor::class);
    }

}

