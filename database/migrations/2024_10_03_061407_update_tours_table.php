<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create categories table
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Create category_plan pivot table
        Schema::create('category_plan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('plan_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['category_id', 'plan_id']);
        });

        // Modify tours table
        Schema::table('tours', function (Blueprint $table) {
            // Remove the price column as it will now come from the plans table
            $table->dropColumn('price');

            // Add foreign key for category_id
            $table->foreignId('category_id')->after('location_id')->constrained()->onDelete('cascade');

            // Add foreign key for plan_id
            $table->foreignId('plan_id')->after('category_id')->constrained()->onDelete('cascade');

            // Modify the location_id to use constrained() and onDelete('cascade')
            $table->dropForeign(['location_id']);
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });

        // Create category_tour pivot table
        Schema::create('category_tour', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->timestamps();
            $table->unique(['category_id', 'tour_id']);
        });
    }

    public function down()
    {
        // Drop the pivot tables
        Schema::dropIfExists('category_tour');
        Schema::dropIfExists('category_plan');

        // Revert changes to the tours table
        Schema::table('tours', function (Blueprint $table) {
            // Add back the price column
            $table->decimal('price', 10, 2)->after('duration');

            // Remove the category_id and plan_id foreign keys
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropForeign(['plan_id']);
            $table->dropColumn('plan_id');

            // Revert the location_id foreign key
            $table->dropForeign(['location_id']);
            $table->foreign('location_id')->references('id')->on('locations');
        });

        // Drop the categories table
        Schema::dropIfExists('categories');
    }
};
