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
        Schema::create('documents', function (Blueprint $table) {
            $table->id(); // BIGINT, Primary Key
            $table->unsignedBigInteger('case_id'); // Foreign Key ke cases.id
            $table->string('nama_dokumen', 150); // Judul dokumen
            $table->enum('jenis_dokumen', ['surat_kuasa', 'berkas_sidang', 'putusan', 'lainnya']); // ENUM
            $table->string('file_path', 255); // Path file
            $table->unsignedBigInteger('uploaded_by'); // Foreign Key ke users.id
            $table->date('tanggal_upload'); // Tanggal upload dokumen
            $table->timestamps(); // created_at & updated_at

            // Foreign key constraints
            $table->foreign('case_id')->references('id')->on('client_cases')->onDelete('cascade');
            // $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('uploaded_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
