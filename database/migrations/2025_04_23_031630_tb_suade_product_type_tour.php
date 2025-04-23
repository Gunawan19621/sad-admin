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

        Schema::create('tb_suade_product_type_tour', function (Blueprint $table) {
            $table->id();
            $table->integer('product_type_id')->nullable();
            $table->string('title_tour')->nullable();
            $table->string('images_tour')->nullable();
            $table->text('description_tour')->nullable();
            $table->text('subtitle_tour')->nullable();
            $table->integer('status_tour')->default(1);
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