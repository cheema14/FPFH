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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // User ID
            $table->string('full_name'); // Full Name
            $table->string('father_husband_name'); // Father's/Husband's Name
            $table->bigInteger('cnic'); // CNIC No.
            $table->date('dob'); // Date of Birth
            $table->enum('gender', ['0', '1', '2']); // Gender (0: Male, 1: Female, 2: Other)
            $table->enum('marital_status', ['0', '1', '2', '3', '4']); // Marital Status
            $table->bigInteger('contact_number'); // Mobile No.
            $table->string('email')->nullable(); // Email
            $table->text('current_address'); // Current Address
            $table->unsignedBigInteger('current_division'); // Foreign key for current division
            $table->unsignedBigInteger('current_district'); // Foreign key for current district
            $table->unsignedBigInteger('current_tehsil'); // Foreign key for current tehsil
            $table->boolean('same_as_current_address'); // Current House Type
            $table->text('permanent_address'); // Permanent Address
            $table->unsignedBigInteger('permanent_division'); // Foreign key for permanent division
            $table->unsignedBigInteger('permanent_district'); // Foreign key for permanent district
            $table->unsignedBigInteger('permanent_tehsil'); // Foreign key for permanent tehsil

            $table->unsignedBigInteger('occupation'); // Occupation of Applicant
            $table->string('employer_name')->nullable(); // Employer Name (Not Mandatory)
            $table->unsignedBigInteger('monthly_income_range')->nullable(); // Monthly Income Range
            $table->unsignedBigInteger('source_of_income'); // Applicant Source of Income
            $table->boolean('own_property'); // Does the applicant own any property?

            $table->integer('total_family_members'); // Total Family Members
            $table->integer('number_of_dependents'); // Number of Dependents
            $table->unsignedBigInteger('spouse_occupation')->nullable(); // Spouse's Occupation
            $table->decimal('combined_family_income', 15, 2); // Combined Family Income

            $table->enum('rented_house', ['yes', 'no']); // Are you currently residing in a rented house?
            $table->decimal('monthly_rent', 10, 2)->nullable(); // Monthly Rent (if applicable)
            $table->enum('government_housing', ['yes', 'no']); // Do you have any prior allotment of government housing?
            $table->string('scheme_name')->nullable(); // Scheme name if applicable
            $table->unsignedBigInteger('housing_location')->nullable(); // Foreign key for housing location
            $table->unsignedBigInteger('plot_size')->nullable(); // Plot size
            $table->boolean('declaration'); // Declaration
            $table->string('applicant_signature'); // Signature of Applicant
            $table->date('date'); // Date of application

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
