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
        Schema::create('tb_news_event', function (Blueprint $table) {
            $table->id();
            $table->integer('id_category_news_event');
            $table->string('image_news_event');
            $table->string('title_news_event');
            $table->date('date_news_event');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb__news_event');
    }
};