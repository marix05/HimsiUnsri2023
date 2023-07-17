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
        Schema::create('staff', function (Blueprint $table) {
            $table->id('staffID');
            $table->string('nama', 255);
            $table->string('NIM', 16)->nullable();
            $table->string('password')->nullable();
            $table->foreignId('dinasID')->nullable()->constrained('dinas', 'dinasID')->onUpdate('cascade')->onDelete('restrict');
            $table->foreignId('divisiID')->nullable()->constrained('divisis', 'divisiID')->onUpdate('cascade')->onDelete('restrict');
            $table->string('tempat_lahir', 100);
            $table->date('tanggal_lahir');
            $table->string('gender', 20);
            $table->string('angkatan', 4);
            $table->string('jabatan', 30);
            $table->string('periode', 4);
            $table->string('email', 100);
            $table->string('instagram', 100);
            $table->text('kesan_pesan')->nullable();
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
