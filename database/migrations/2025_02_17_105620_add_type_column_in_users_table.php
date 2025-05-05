<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'type')) {
                $table->smallInteger('type')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Remove the 'type' column if it exists
            if (Schema::hasColumn('users', 'type')) {
                $table->dropColumn('type');
            }
        });
    }
};
