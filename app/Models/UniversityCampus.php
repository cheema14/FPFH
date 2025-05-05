<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UniversityCampus extends Model
{
    protected $fillable = [
        'university_profile_id',
        'campus_name',
        'campus_address'
    ];

    public function universityProfile()
    {
        return $this->belongsTo(UniversityProfile::class);
    }
} 