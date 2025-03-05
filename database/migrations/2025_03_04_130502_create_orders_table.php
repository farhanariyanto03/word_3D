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
        Schema::create('orders', function (Blueprint $table) {
            $table->char('id', 10)->primary();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('produk_video_id');
            $table->unsignedBigInteger('nomor_rekening_id');
            $table->integer('bayar');
            $table->integer('sisa_bayar');
            $table->text('bukti_tf');
            $table->enum('status', ['sudah bayar', 'proses', 'selesai'])->default('sudah bayar');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('produk_video_id')->references('id')->on('produk_videos')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('nomor_rekening_id')->references('id')->on('nomor_rekenings')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
