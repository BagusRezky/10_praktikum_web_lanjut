<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('mahasiswa', function (Blueprint $table) {
            //to do:lowercase
            $table->id();
            $table->integer('Nim')->unique();
            // $table->primary('Nim');
            $table->string('Nama', 100);
            $table->string('Kelas', 100);
            $table->string('Jurusan', 100);
            $table->string('No_Handphone', 15);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
