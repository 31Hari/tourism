<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Create categories table if it doesn't exist
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->id();
                $table->string('name', 100);
                $table->text('description')->nullable();
                $table->timestamps();
            });
        }

        // Create category_plan pivot table if it doesn't exist
        if (!Schema::hasTable('category_plan')) {
            Schema::create('category_plan', function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
                $table->foreignId('plan_id')->constrained()->onDelete('cascade');
                $table->timestamps();
                $table->unique(['category_id', 'plan_id']);
            });
        }

        // Update tours table
        Schema::table('tours', function (Blueprint $table) {
            // Remove the price column if it exists
            if (Schema::hasColumn('tours', 'price')) {
                $table->dropColumn('price');
            }

            // Add category_id if it doesn't exist
            if (!Schema::hasColumn('tours', 'category_id')) {
                $table->foreignId('category_id')->after('location_id')->constrained()->onDelete('cascade');
            }

            // Add plan_id if it doesn't exist
            if (!Schema::hasColumn('tours', 'plan_id')) {
                $table->foreignId('plan_id')->after('category_id')->constrained()->onDelete('cascade');
            }

            // Update location_id foreign key
            $table->dropForeign(['location_id']);
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
        });

        // Create category_tour pivot table if it doesn't exist
        if (!Schema::hasTable('category_tour')) {
            Schema::create('category_tour', function (Blueprint $table) {
                $table->id();
                $table->foreignId('category_id')->constrained()->onDelete('cascade');
                $table->foreignId('tour_id')->constrained()->onDelete('cascade');
                $table->timestamps();
                $table->unique(['category_id', 'tour_id']);
            });
        }
    }

    public function down()
    {
        // Drop category_tour pivot table
        Schema::dropIfExists('category_tour');

        // Revert changes to tours table
        Schema::table('tours', function (Blueprint $table) {
            // Add back the price column
            if (!Schema::hasColumn('tours', 'price')) {
                $table->decimal('price', 10, 2)->after('duration');
            }

            // Remove category_id and plan_id
            if (Schema::hasColumn('tours', 'category_id')) {
                $table->dropForeign(['category_id']);
                $table->dropColumn('category_id');
            }
            if (Schema::hasColumn('tours', 'plan_id')) {
                $table->dropForeign(['plan_id']);
                $table->dropColumn('plan_id');
            }

            // Revert location_id foreign key
            $table->dropForeign(['location_id']);
            $table->foreign('location_id')->references('id')->on('locations');
        });

        // Drop category_plan pivot table
        Schema::dropIfExists('category_plan');

        // Drop categories table
        Schema::dropIfExists('categories');
    }
};
