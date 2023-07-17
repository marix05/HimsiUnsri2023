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
        Schema::create('proker_himsis', function (Blueprint $table) {
            $table->id('prokerID');
            $table->string('proker', 255);
            $table->date('pelaksanaan');
            $table->string('sasaran', 100);
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
        Schema::dropIfExists('proker_himsis');
    }
};
