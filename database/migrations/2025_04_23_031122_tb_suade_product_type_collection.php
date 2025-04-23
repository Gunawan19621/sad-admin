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

        Schema::create('tb_suade_product_type_collection', function (Blueprint $table) {
            $table->id();
            $table->integer('product_type_id')->nullable();
            $table->string('name_collection')->nullable();
            $table->string('images_collection')->nullable();
            $table->integer('status_collection')->default(1);
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