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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            
            $table->string('nama', 100);
            $table->string('nik', 20)->unique();
            $table->text('alamat');
            $table->string('no_hp', 15);
            $table->date('tanggal_input');
            $table->date('tempat_lahir')->nullable(); 
            $table->date('tanggal_lahir')->nullable(); 
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan'])->nullable();

            // Relasi ke tabel users
            $table->unsignedBigInteger('created_by'); // staf input | berdasarkan id user

            $table->timestamps();

            // Foreign keys
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
