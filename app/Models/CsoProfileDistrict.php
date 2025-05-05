<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsoProfileDistrict extends Model
{
    protected $table = 'cso_profiles_districts';
    protected $fillable = [
        'cso_profile_id',
        'district_id'
    ];

    /**
     * Get the CSO profile that owns this district relationship.
     */
    public function csoProfile(): BelongsTo
    {
        return $this->belongsTo(CsoProfile::class);
    }

    /**
     * Get the district associated with this relationship.
     */
    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class);
    }
}
