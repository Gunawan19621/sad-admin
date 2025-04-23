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
        //


        Schema::create('tb_suade_experience', function (Blueprint $table) {
            $table->id();
            $table->string('name_experience')->nullable();
            $table->string('image_experience')->nullable();
            $table->integer('price_experience')->nullable();
            $table->integer('discount_experience')->nullable();
            $table->text('description_experience')->nullable();
            $table->text('additional_experience')->nullable();
            $table->text('subtitle_experience')->nullable();
            $table->integer('status_experience')->default(1);
            $table->integer('category_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};