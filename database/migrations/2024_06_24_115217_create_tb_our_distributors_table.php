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
        Schema::create('tb_our_distributors', function (Blueprint $table) {
            $table->id();
            $table->string('name_distributor');
            $table->string('address_distributor');
            $table->string('name_person_distributor');
            $table->string('email_distributor')->unique();
            $table->string('phone_distributor');
            $table->string('website_distributor')->nullable();
            $table->string('image_distributor')->nullable();
            $table->string('description_distributor')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_our_distributors');
    }
};
