<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentIncomeDetail extends Model
{
    use HasFactory;

    protected $table = 'employment_income_details'; // Specify the table name

    protected $fillable = [
        'category', // Fillable fields
    ];
} 