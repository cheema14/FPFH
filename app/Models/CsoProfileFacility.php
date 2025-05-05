<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CsoProfileFacility extends Pivot
{
    protected $table = 'cso_profile_facilities';

    protected $fillable = [
        'cso_profile_id',
        'facility_id'
    ];

    public function csoProfile()
    {
        return $this->belongsTo(CsoProfile::class);
    }

    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }
} 