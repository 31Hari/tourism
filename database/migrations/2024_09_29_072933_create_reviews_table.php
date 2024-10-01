<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->enum('service_type', ['hotel', 'tour']);
            $table->unsignedBigInteger('service_id');
            $table->integer('rating')->check('rating >= 1 AND rating <= 5');
            $table->text('comment')->nullable();
            $table->boolean('is_reported')->default(false);
            $table->timestamps();

            // Note: We can't create a foreign key for service_id because it could refer to different tables
            // You might want to handle this relationship in your application logic
        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
};
