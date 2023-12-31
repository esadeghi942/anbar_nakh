<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class create_user extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
           'name'=>'admin',
           'role'=>'admin',
           'email'=>'admin@gmail.com',
           'password'=>Hash::make('123456')
        ]);

        User::create([
           'name'=>'carpet-admin',
           'role'=>'carpet',
           'email'=>'carpet-admin@gmail.com',
           'password'=>Hash::make('123456')
        ]);

        User::create([
           'name'=>'string-admin',
           'role'=>'string',
           'email'=>'string-admin@gmail.com',
           'password'=>Hash::make('123456')
        ]);
    }
}
