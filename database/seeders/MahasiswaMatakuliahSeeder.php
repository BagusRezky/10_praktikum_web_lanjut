<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MahasiswaMatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scoreCount = 100;
        $scoreOptions = ['A', 'B', 'C', 'D', 'E'];
        for ($i = 0; $i < $scoreCount; $i++) {
            DB::table('mahasiswa_matakuliah')->insert([
                'mahasiswa_id' => rand(1, 20),
                'matakuliah_id' => rand(1, 4),
                'nilai' => array_rand($scoreOptions),
            ]);
        }
    }
}
