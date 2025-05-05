<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsoProfileDivision extends Model
{
    protected $table = 'cso_profiles_divisions';
    protected $fillable = [
        'cso_profile_id',
        'division_id'
    ];

    /**
     * Get the CSO profile that owns this division relationship.
     */
    public function csoProfile(): BelongsTo
    {
        return $this->belongsTo(CsoProfile::class);
    }

    /**
     * Get the division associated with this relationship.
     */
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class);
    }
}
