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
        Schema::create('jadwals', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->foreignId('guru_id')
                ->constrained('gurus')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('hari_id')
                ->constrained('haris')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('mata_pelajaran_id')
                ->constrained('mata_pelajarans')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('jenjang_id')
                ->constrained('jenjangs')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('waktu');
            $table->integer('harga');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwals');
    }
};