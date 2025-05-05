<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CsoProfileActivity extends Pivot
{
    protected $table = 'cso_profile_activities';

    // Allow mass assignment
    protected $fillable = [
        'cso_profile_id',
        'activity_id'
    ];

    // Define relationships
    public function csoProfile()
    {
        return $this->belongsTo(CsoProfile::class);
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
} 