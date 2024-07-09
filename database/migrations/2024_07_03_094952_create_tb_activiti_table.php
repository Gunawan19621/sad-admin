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
        Schema::create('tb_activiti', function (Blueprint $table) {
            $table->id();
            $table->string('image_activiti');
            $table->string('title_activiti');
            $table->string('subtitle_activiti');
            $table->text('description_activiti');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_activiti');
    }
};
