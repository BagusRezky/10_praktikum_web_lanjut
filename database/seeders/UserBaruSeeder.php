<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserBaruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()    
    {
        DB::table('users')->insert([
            'username'=>'admin',
            'name'=>'Administrator',
            'email'=>'admin@admin.com',
            'created_at'=>now(),
            'password'=>Hash::make('password'),
        ]);
    }
}
