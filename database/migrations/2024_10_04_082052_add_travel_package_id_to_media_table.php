<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->foreignId('travel_package_id')->nullable()->constrained('travel_packages')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropForeign(['travel_package_id']);
            $table->dropColumn('travel_package_id');
        });
    }
};