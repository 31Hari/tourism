<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_plan', function (Blueprint $table) {
            // Create an auto-incrementing primary key column named 'id'
            $table->id();

            // Create a column for the category foreign key
            $table->unsignedBigInteger('category_id');

            // Create a column for the plan foreign key
            $table->unsignedBigInteger('plan_id');

            // Add created_at and updated_at timestamp columns
            $table->timestamps();

            // Define foreign key constraint for category_id
            // This ensures that category_id references the id column in the categories table
            // The onDelete('cascade') means that if a category is deleted, related records in this table will also be deleted
            $table->foreign('category_id')
                  ->references('id')
                  ->on('categories')
                  ->onDelete('cascade');

            // Define foreign key constraint for plan_id
            // This ensures that plan_id references the id column in the plans table
            // The onDelete('cascade') means that if a plan is deleted, related records in this table will also be deleted
            $table->foreign('plan_id')
                  ->references('id')
                  ->on('plans')
                  ->onDelete('cascade');

            // Optionally, you can add a unique constraint to prevent duplicate category-plan pairs
            // $table->unique(['category_id', 'plan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Drop the table if it exists
        Schema::dropIfExists('category_plan');
    }
}
