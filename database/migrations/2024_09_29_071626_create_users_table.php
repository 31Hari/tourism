<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 50)->unique();
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->string('first_name', 50)->nullable();
            $table->string('last_name', 50)->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->string('phone_number', 20)->nullable(); // Added phone number
            $table->string('aadhar_number', 12)->nullable(); // Added Aadhar number
            $table->string('driving_license', 20)->nullable(); // Added driving license number
            $table->string('voter_id', 20)->nullable(); // Added voter ID
            $table->enum('role', ['admin', 'user'])->default('user');
            $table->boolean('is_active')->default(true);
            $table->dateTime('last_login')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};