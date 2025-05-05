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
        DB::statement("
            ALTER TABLE `applications` CHANGE `occupation` `occupation` BIGINT UNSIGNED NULL DEFAULT NULL, CHANGE `source_of_income` `source_of_income` BIGINT UNSIGNED NULL DEFAULT NULL, CHANGE `own_property` `own_property` TINYINT(1) NULL DEFAULT NULL, CHANGE `total_family_members` `total_family_members` INT NULL DEFAULT NULL, CHANGE `number_of_dependents` `number_of_dependents` INT NULL DEFAULT NULL, CHANGE `combined_family_income` `combined_family_income` DECIMAL(15,2) NULL DEFAULT NULL, CHANGE `rented_house` `rented_house` ENUM('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL, CHANGE `government_housing` `government_housing` ENUM('yes','no') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL, CHANGE `declaration` `declaration` TINYINT(1) NULL DEFAULT NULL, CHANGE `applicant_signature` `applicant_signature` VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL, CHANGE `date` `date` DATE NULL DEFAULT NULL;
        ");
    }

    
};
