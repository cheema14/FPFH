<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpertiseArea extends Model
{
    protected $fillable = ['name'];

    public function csoProfiles()
    {
        return $this->belongsToMany(CsoProfile::class, 'cso_profile_expertise_area');
    }
} 