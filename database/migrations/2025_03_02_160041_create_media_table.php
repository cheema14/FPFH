<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('application_medias', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable(); // Foreign key to users table
            $table->bigInteger('application_id')->nullable(); // Foreign key to applications table
            $table->string('file_path')->nullable(); // Path to the uploaded file
            $table->string('file_name')->nullable(); // Original name of the uploaded file
            $table->string('file_type')->nullable(); // Type of the file (e.g., image/jpeg)
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('application_medias');
    }
};
