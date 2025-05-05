<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    // Specify the table associated with the model (optional if the table name is plural of the model name)
    protected $table = 'applications';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'user_id',
        'full_name',
        'father_husband_name',
        'cnic',
        'dob',
        'gender',
        'marital_status',
        'contact_number',
        'email',
        'current_address',
        'current_division',
        'current_district',
        'current_tehsil',
        'same_as_current_address',
        'permanent_address',
        'permanent_division',
        'permanent_district',
        'permanent_tehsil',
        'occupation',
        'employer_name',
        'monthly_income_range',
        'source_of_income',
        'own_property',
        'total_family_members',
        'number_of_dependents',
        'spouse_occupation',
        'combined_family_income',
        'rented_house',
        'monthly_rent',
        'government_housing',
        'scheme_name',
        'housing_location',
        'plot_size',
        'declaration',
        'applicant_signature',
        'date',
        'status',
        'current_step',
        'nominee',
        'loan_option',
        'loan_amount',
    ];

    public const LOAN_RANGE = [
        100000 => '100,000',
        200000 => '200,000',
        300000 => '300,000',
        400000 => '400,000',
        500000 => '500,000',
        600000 => '600,000',
        700000 => '700,000',
        800000 => '800,000',
        900000 => '900,000',
        1000000 => '1,000,000',
        1100000 => '1,100,000',
        1200000 => '1,200,000',
        1300000 => '1,300,000',
        1400000 => '1,400,000',
        1500000 => '1,500,000',
    ];

    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function Occupation()
    {
        return $this->belongsTo(Occupation::class, 'occupation');
    }

    public function sourceOfIncome()
    {
        return $this->belongsTo(IncomeSource::class, 'source_of_income');
    }

    public function spouseOccupation()
    {
        return $this->belongsTo(Occupation::class, 'spouse_occupation');
    }

    public function monthlyIncomeRange()
    {
        return $this->belongsTo(MonthlyIncomeRange::class, 'monthly_income_range');
    }

    public function combinedFamilyIncome()
    {
        return $this->belongsTo(MonthlyIncomeRange::class, 'combined_family_income');
    }

    public function currentDivision()
    {
        return $this->belongsTo(Division::class, 'current_division');
    }

    public function currentDistrict()
    {
        return $this->belongsTo(District::class, 'current_district');
    }

    public function currentTehsil()
    {
        return $this->belongsTo(Tehsil::class, 'current_tehsil');
    }

    public function permanentDivision()
    {
        return $this->belongsTo(Division::class, 'permanent_division');
    }

    public function permanentDistrict()
    {
        return $this->belongsTo(District::class, 'permanent_district');
    }

    public function permanentTehsil()
    {
        return $this->belongsTo(Tehsil::class, 'permanent_tehsil');
    }

    public function housingLocation()
    {
        return $this->belongsTo(District::class, 'housing_location');
    }

    public function applicationMedia()
    {
        return $this->hasMany(ApplicationMedia::class);
    }

    // Add other relationships as necessary
}
