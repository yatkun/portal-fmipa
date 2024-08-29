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
        Schema::create('dokumenikus', function (Blueprint $table) {
            $table->id();
			$table->text('nama_dokumen');
            $table->string('keterangan');
			$table->text('jenis_iku');
            $table->text('link');
            $table->text('files')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dokumenikus');
    }
};
