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
            $table->string('fathers_husbands_name')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->tinyInteger('gender')->nullable()->comment('Possible values: 0 = Male, 1 = Female, 2 = Other');
            $table->tinyInteger('marital_status')->nullable()->comment('Possible values: 0 = Single, 1 = Married, 2 = Divorced, 3 = Widowed');
            $table->string('current_address')->nullable();
            $table->foreignId('current_division_id')->nullable();
            $table->foreignId('current_district_id')->nullable();
            $table->foreignId('current_tehsil_id')->nullable();
            $table->string('permanent_address')->nullable();
            $table->foreignId('permanent_division_id')->nullable();
            $table->foreignId('permanent_district_id')->nullable();
            $table->foreignId('permanent_tehsil_id')->nullable();
            $table->boolean('same_address')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('fathers_husbands_name');
            $table->dropColumn('date_of_birth');
            $table->dropColumn('gender');
            $table->dropColumn('marital_status');
            $table->dropColumn('current_address');
            $table->dropForeign(['current_division_id']);
            $table->dropForeign(['current_district_id']);
            $table->dropForeign(['current_tehsil_id']);
            $table->dropColumn('current_division_id');
            $table->dropColumn('current_district_id');
            $table->dropColumn('current_tehsil_id');
            $table->dropColumn('permanent_address');
            $table->dropForeign(['permanent_division_id']);
            $table->dropForeign(['permanent_district_id']);
            $table->dropForeign(['permanent_tehsil_id']);
            $table->dropColumn('permanent_division_id');
            $table->dropColumn('permanent_district_id');
            $table->dropColumn('permanent_tehsil_id');
            $table->dropColumn('same_address');
        });
    }
};
