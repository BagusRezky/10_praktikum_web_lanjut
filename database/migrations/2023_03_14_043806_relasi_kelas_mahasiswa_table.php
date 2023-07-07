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
        Schema::table('mahasiswa',function(Blueprint $table){
            $table->dropColumn('kelas');//menghapus kolom
            $table->unsignedBigInteger('kelas_id')->nullable();//membuat kolom
            $table->foreign('kelas_id')->references('id')->on('kelas');//menghubungkan foreign key
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('mahasiswa', function (Blueprint $table) {
           $table->string('kelas'); 
           $table->dropForeign(['kelas_id']);
           $table->dropColumn(['kelas_id']);
        });
    }
};
