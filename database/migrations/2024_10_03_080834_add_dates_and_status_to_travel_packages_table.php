<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('travel_packages', function (Blueprint $table) {
            $table->date('start_date')->after('description');
            $table->date('end_date')->after('start_date');
            $table->dropColumn('duration');
            $table->integer('duration')->storedAs('DATEDIFF(end_date, start_date)')->after('end_date');
            $table->enum('status', ['active', 'inactive'])->default('active')->after('duration');
        });
    }

    public function down()
    {
        Schema::table('travel_packages', function (Blueprint $table) {
            $table->dropColumn(['start_date', 'end_date', 'status']);
            $table->integer('duration')->after('description');
        });
    }
};
