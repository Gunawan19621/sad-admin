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
        Schema::create('tb_partners', function (Blueprint $table) {
            $table->id();
            $table->string('name_partner');
            $table->string('image_partner');
            $table->string('address_partner')->nullable();
            $table->string('description_partner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_partners');
    }
};