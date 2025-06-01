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
        Schema::create('case_progress', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('case_id');
            $table->string('tahap', 100);
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->string('lampiran', 255)->nullable();

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
        Schema::dropIfExists('case_progress');
    }
};
