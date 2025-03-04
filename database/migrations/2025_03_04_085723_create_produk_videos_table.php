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
        Schema::create('produk_videos', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->string('gambar_produk');
            $table->integer('harga_produk');
            $table->integer('minimal_dp');
            $table->string('deskripsi_produk');
            $table->string('syarat_ketentuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produk_videos');
    }
};
