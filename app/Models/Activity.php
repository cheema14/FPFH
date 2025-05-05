<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
        
    protected $fillable = ['name'];

    public function csoProfiles()
    {
        return $this->belongsToMany(CsoProfile::class, 'cso_profile_activities');
    }
}
