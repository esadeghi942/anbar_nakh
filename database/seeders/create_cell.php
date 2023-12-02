<?php

namespace Database\Seeders;

use App\Models\Cell;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class create_cell extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cell::create([
            'customer_id'=>1,
            'anbar_id'=>1,
            'color'=>'#eeeeee',
            'code'=>'w05'
        ]);
    }
}
