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

        Schema::create('tb_suade_account', function (Blueprint $table) {
            $table->id();
            $table->string('firstname_account')->nullable();
            $table->string('lastname_account')->nullable();
            $table->string('email_account')->nullable();
            $table->date('birthdate_account')->nullable();
            $table->string('password_account')->nullable();
            $table->integer('status_account')->default(1);
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