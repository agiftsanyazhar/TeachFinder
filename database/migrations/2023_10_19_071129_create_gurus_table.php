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
        Schema::create('gurus', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->boolean('is_active')->default(0);
            $table->foreignId('lokasi_id')
                ->constrained('lokasis')
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
            $table->string('skl_ijazah');
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gurus');
    }
};
