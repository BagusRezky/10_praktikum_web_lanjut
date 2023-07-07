<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UpdateMahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //misal kita update data mahasiswa yang ada saat ini milik ti-2a
        DB::table('mahasiswa')->update(['kelas_id' => 1]);
    }
}
