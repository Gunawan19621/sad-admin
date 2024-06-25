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
        Schema::create('tb_awards', function (Blueprint $table) {
            $table->id();
            $table->string('image_awards');
            $table->string('title_awards')->nullable();
            $table->string('subtitle_awards')->nullable();
            $table->date('date_awards');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_awards');
    }
};
