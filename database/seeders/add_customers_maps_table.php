<?php

namespace Database\Seeders;

use App\Models\Carpet\Map;
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
            DB::unprepared(file_get_contents(storage_path('sql/customers.sql')));
        }catch (\Exception $e){
            echo $e->getMessage();
        }
        // excract sql/Maps.zip in stoarge/app/public folder and after run this query
        $files = Storage::disk('public')->files('maps');
        foreach ($files as  $file) {
            $ss = str_replace('maps/','',$file);
            Map::create(['name' => $ss, 'image' => $ss]);
        }
    }
}
