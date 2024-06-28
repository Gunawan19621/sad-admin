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
        Schema::create('tb_product', function (Blueprint $table) {
            $table->id();
            $table->integer('id_distributor')->nullable();
            $table->integer('id_category_product')->nullable();
            $table->string('image_product');
            $table->string('name_product');
            $table->text('description_product');
            $table->integer('price_product')->nullable();
            $table->integer('stock_product')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_product');
    }
};
