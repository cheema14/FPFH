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
        Schema::create('sms_logs', function (Blueprint $table) {
            $table->id();
            $table->biginteger('cnic')->index();
            $table->biginteger('mobile_no')->index();
            $table->longText('message');
            $table->tinyInteger('is_delivered')->default(0);
            $table->string('performed_action');
            $table->string('api_response');
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_logs');
    }
};
