<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pojok_himsis', function (Blueprint $table) {
            $table->id('postID');
            $table->string('title');
            $table->string('author', 100);
            $table->text('trigger');
            $table->longText('content');
            $table->string('periode', 4);
            $table->string('thumbnail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pojok_himsis');
    }
};
