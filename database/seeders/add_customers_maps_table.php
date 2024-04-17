<?php

namespace Database\Seeders;

use App\Models\Carpet\Map;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;


class add_customers_maps_table extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        try {
           // DB::unprepared(file_get_contents(storage_path('sql/customers.sql')));
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        $files = Storage::disk('public')->files('maps');
        foreach ($files as $file){
            $name=trim($file,'maps/');
            Map::create(['name'=>$name,'image'=>$name]);
        }

        User::crea
    }
}
