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
        Schema::create('nadra_api_logs', function (Blueprint $table) {
            $table->id();
            $table->biginteger('cnic')->index()->nullable();
            $table->longText('request')->nullable();
            $table->json('response')->nullable();
            $table->string('success_or_error', 10)->nullable();
            $table->longText('curl_error_msg')->nullable();
            $table->tinyInteger('is_found')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nadra_api_logs');
    }
};
