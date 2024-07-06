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
            $table->integer('id_distributor');
            $table->integer('id_sub_category');
            $table->string('image_product');
            $table->string('name_product');
            $table->string('sub_product');
            $table->text('description_product');
            $table->integer('year_product');
            $table->decimal('alcohol', 10, 2);
            $table->integer('temperature');
            $table->string('cellaring');
            $table->decimal('total_acidity', 10, 2);
            $table->decimal('ressidual_sugar', 10, 2);
            $table->integer('bottle_produced');
            $table->string('size_bottle');
            $table->integer('award_won');
            $table->text('characteristics');
            $table->text('testing_note');
            $table->text('food_pairing');
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