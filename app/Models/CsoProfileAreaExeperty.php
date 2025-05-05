<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CsoProfileAreaExeperty extends Model
{
    protected $table = 'cso_profile_area_exeperties';

    protected $fillable = [
        'cso_profile_id',
        'expertise_area_id',
    ];

    /**
     * Get the CSO profile that owns this expertise area.
     */
    public function csoProfile()
    {
        return $this->belongsTo(CsoProfile::class);
    }

    /**
     * Get the expertise area associated with this record.
     */
    public function expertiseArea()
    {
        return $this->belongsTo(ExpertiseArea::class);
    }
} 