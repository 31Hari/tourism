<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Remove file-related columns from the media table
        Schema::table('media', function (Blueprint $table) {
            $table->dropColumn(['file_name', 'file_path']);
            $table->renameColumn('file_type', 'type');
        });

        // Create a new table for media files
        Schema::create('media_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('media_id')->constrained('media')->onDelete('cascade');
            $table->string('file_name');
            $table->string('file_path');
            $table->timestamps();
        });
    }

    public function down()
    {
        // Drop the new media_files table
        Schema::dropIfExists('media_files');

        // Revert changes to the media table
        Schema::table('media', function (Blueprint $table) {
            $table->string('file_name');
            $table->string('file_path');
            $table->renameColumn('type', 'file_type');
        });
    }
};
