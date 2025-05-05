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
        Schema::create('monthly_income_ranges', function (Blueprint $table) {
            $table->id();
            $table->string('range'); // Column for income ranges
            $table->timestamps();
        });

        // Insert default income ranges
        DB::table('monthly_income_ranges')->insert([
            ['range' => 'Below $1,000'],
            ['range' => '$1,000 - $2,999'],
            ['range' => '$3,000 - $4,999'],
            ['range' => '$5,000 - $9,999'],
            ['range' => '$10,000 and above'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('monthly_income_ranges');
    }
};
