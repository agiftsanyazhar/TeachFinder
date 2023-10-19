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
        Schema::create('alamat_gurus', function (Blueprint $table) {
            $table->id();
            $table->foreignId('guru_id')
                ->constrained('gurus')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->longText('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat_gurus');
    }
};
