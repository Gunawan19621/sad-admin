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

        Schema::create('tb_suade_product', function (Blueprint $table) {
            $table->id();
            $table->string('name_product')->nullable();
            $table->string('image_product')->nullable();
            $table->integer('price_product')->nullable();
            $table->integer('discount_product')->nullable();
            $table->text('description_product')->nullable();
            $table->text('additional_product')->nullable();
            $table->text('subtitle_product')->nullable();
            $table->integer('status_product')->default(1);
            $table->integer('category_id')->nullable();
            $table->integer('type_id')->nullable();
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