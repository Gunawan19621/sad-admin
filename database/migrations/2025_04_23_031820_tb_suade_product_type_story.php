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

        Schema::create('tb_suade_product_type_story', function (Blueprint $table) {
            $table->id();
            $table->integer('product_type_id')->nullable();
            $table->string('title_story')->nullable();
            $table->string('images_story')->nullable();            
            $table->text('description_story')->nullable();
            $table->text('subtitle_story')->nullable();
            $table->integer('status_story')->default(1);
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