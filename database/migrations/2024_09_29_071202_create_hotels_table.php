<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->text('address')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->text('amenities')->nullable();
            $table->text('policies')->nullable();
            $table->timestamps();

            $table->foreign('location_id')->references('id')->on('locations');
        });
    }

    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
