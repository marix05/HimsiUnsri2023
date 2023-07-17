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
        Schema::create('divisis', function (Blueprint $table) {
            $table->id('divisiID');
            $table->foreignId('dinasID')->constrained('dinas', 'dinasID')->onUpdate('cascade')->onDelete('restrict');
            $table->string('divisi', 30);
            $table->text('deskripsi');
            $table->string('icon', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('divisis');
    }
};
