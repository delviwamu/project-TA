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
        Schema::create('client_cases', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('client_id');
            $table->string('judul_kasus', 150);
            $table->enum('jenis_kasus', ['pidana', 'perdata', 'keluarga', 'lainnya']);
            $table->text('kronologi')->nullable();
            $table->enum('status', ['baru', 'berjalan', 'selesai', 'ditolak'])->default('baru');

            $table->unsignedBigInteger('created_by')->default('1'); 
            $table->unsignedBigInteger('pengacara_id');
            $table->unsignedBigInteger('kepala_advokasi_id');

            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai')->nullable();

            $table->timestamps();

            // Foreign key constraints
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->foreign('pengacara_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('kepala_advokasi_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('client_cases');
    }
};
