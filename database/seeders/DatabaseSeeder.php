<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Database\Seeders\MahasiswaMatakuliahSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //to run a migration use migrate, then rollback one, then seed

        // \App\Models\User::factory(10)->create();
        $this->call([KelasSeeder::class]);
        \App\Models\Mahasiswa::factory(20)->create();
        $this->call([
            PostSeeder::class,
        ]);
        // $this->call([UserSeeder::class,]);
        Post::factory(100)->create();

        // langsung seeding userbaru
        $this->call([UserBaruSeeder::class]);
        $this->call([MataKuliahSeeder::class]);
        $this->call([MahasiswaMatakuliahSeeder::class]);
        // $this->call([UpdateMahasiswaSeeder::class]); //not necessary because i've done it in mahasiswaSeeder
    }
}
