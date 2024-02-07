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
        Schema::create('tugas_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kelas_user_id');
            $table->unsignedBigInteger('tugas_id');
            $table->unique(['kelas_user_id', 'tugas_id']);
            $table->text('deskripsi')->nullable();
            $table->text('link')->nullable();
            $table->string('nilai')->nullable();
            $table->text('tanggapan')->nullable();
            $table->date('tgl_kirim');
            $table->foreign('kelas_user_id')->references('id')->on('kelas_user')->onDelete('cascade');
            $table->foreign('tugas_id')->references('id')->on('tugas')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tugas_user');
    }
};
