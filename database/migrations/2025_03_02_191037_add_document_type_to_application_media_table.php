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
        Schema::table('application_medias', function (Blueprint $table) {
            $table->string('document_type')->after('file_type')->nullable(); // Add the document_type column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application_medias', function (Blueprint $table) {
            $table->dropColumn('document_type'); // Remove the document_type column if rolling back
        });
    }
};
