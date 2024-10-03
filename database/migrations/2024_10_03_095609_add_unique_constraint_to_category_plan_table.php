<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// This class adds a unique constraint to the category_plan table
class AddUniqueConstraintToCategoryPlanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Modify the existing 'category_plan' table
        Schema::table('category_plan', function (Blueprint $table) {
            // Add a unique constraint to the combination of 'category_id' and 'plan_id'
            // This ensures that no duplicate category-plan pairs can be inserted
            $table->unique(['category_id', 'plan_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Modify the 'category_plan' table
        Schema::table('category_plan', function (Blueprint $table) {
            // Remove the unique constraint from the combination of 'category_id' and 'plan_id'
            // This is necessary for rolling back the migration
            $table->dropUnique(['category_id', 'plan_id']);
        });
    }
}
