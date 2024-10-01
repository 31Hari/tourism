<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('itinerary_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('itinerary_id')->constrained();
            $table->enum('service_type', ['hotel', 'tour', 'activity']);
            $table->unsignedBigInteger('service_id');
            $table->dateTime('start_datetime');
            $table->dateTime('end_datetime');
            $table->text('notes')->nullable();
            $table->timestamps();

            // Note: We can't create a foreign key for service_id because it could refer to different tables
            // You might want to handle this relationship in your application logic
        });
    }

    public function down()
    {
        Schema::dropIfExists('itinerary_items');
    }
};