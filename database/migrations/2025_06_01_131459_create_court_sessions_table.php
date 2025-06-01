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
        Schema::create('court_sessions', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('case_id');
            $table->date('tanggal_sidang');
            $table->string('lokasi', 150);
            $table->string('nomor_perkara', 100);
            $table->text('hasil_sidang');
            $table->text('catatan')->nullable();

            $table->timestamps();

            // Foreign key constraint
            $table->foreign('case_id')->references('id')->on('client_cases')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('court_sessions');
    }
};
