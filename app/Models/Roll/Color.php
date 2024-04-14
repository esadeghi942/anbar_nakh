<?php

namespace App\Models\Roll;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'roll_colors';

    protected $fillable = ['name'];

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
