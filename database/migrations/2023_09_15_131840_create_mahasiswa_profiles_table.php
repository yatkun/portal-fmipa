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
        Schema::create('mahasiswa_profiles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('prodi')->nullable();
            $table->string('semester')->nullable();
            $table->string('angkatan')->nullable();
            $table->string('kelas')->nullable();
            $table->text('alamat')->nullable();
            $table->string('nohp')->nullable();
            $table->string('email')->nullable();
            $table->string('foto')->default('avatar.png');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa_profiles');
    }
};
