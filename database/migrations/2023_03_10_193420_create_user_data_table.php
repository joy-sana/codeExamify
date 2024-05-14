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
        Schema::create('user_data', function (Blueprint $table) {

            $table->id('student_id');
            $table->string('name',60);
            $table->string('username',24);
            $table->string('email');
            $table->bigInteger('mobile')->unique();
            $table->enum('gender',["m","f","o"])->nullable();
            $table->date('dob')->nullable();
            $table->string('password');
            $table->string('confirm_pass');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_data');
    }
};
