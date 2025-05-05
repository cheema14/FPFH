<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWatchesTable extends Migration
{
    public function up()
    {
        Schema::create('watches', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('sku_code')->nullable();
            $table->string('size')->nullable();
            $table->string('details')->nullable();
            $table->string('color')->nullable();
            $table->decimal('price', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
