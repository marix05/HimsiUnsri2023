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
        Schema::create('proker_dinas', function (Blueprint $table) {
            $table->id('prokerID');
            $table->foreignId('dinasID')->constrained('dinas', 'dinasID')->onUpdate('cascade')->onDelete('restrict');
            $table->string('proker', 255);
            $table->text('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proker_dinas');
    }
};
