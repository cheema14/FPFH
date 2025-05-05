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
        Schema::create('second_acknowledgement_checks', function (Blueprint $table) {
            $table->id();
            $table->boolean('punjab_resident')->default(false);
            $table->boolean('same_district_application')->default(false);
            $table->boolean('no_plot_associated')->default(false);
            $table->boolean('not_blacklisted')->default(false);
            $table->boolean('no_criminal_record')->default(false);
            $table->foreignId('user_id')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('second_acknowledgement_checks');
    }
};
