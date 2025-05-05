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
        Schema::table('users', function (Blueprint $table) {
            // Adding telecom_company_id as tiny integer
            $table->tinyInteger('telecom_company_id')->unsigned()->nullable();
            // Adding contact_number as big integer
            $table->bigInteger('contact_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Dropping the columns if the migration is rolled back
            $table->dropColumn('telecom_company_id');
            $table->dropColumn('contact_number');
        });
    }
};
