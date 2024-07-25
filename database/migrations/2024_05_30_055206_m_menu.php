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
        Schema::create('m_menu', function(Blueprint $table){
            $table->id('id_menu');
            $table->string('nama_menu', 100);
            $table->text('deskripsi_menu');
            $table->integer('harga_menu');
            $table->string('gambar_menu');
            $table->integer('stok_menu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_menu');
    }
};
