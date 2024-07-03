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
        Schema::create('tb_contact_us', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('operating_hours');
            $table->string('email');
            $table->string('phone');
            $table->string('fax');
            $table->json('social_media')->nullable();
            $table->text('google_maps');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tb_contact_us');
    }
};
