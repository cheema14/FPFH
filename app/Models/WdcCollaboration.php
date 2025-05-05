<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WdcCollaboration extends Model
{
    protected $table = 'wdc_collaborations';
    protected $fillable = ['collaboration_range'];

    public function csoProfiles()
    {
        return $this->belongsToMany(CsoProfile::class, 'cso_profile_wdc_collaborations')
                    ->using(CsoProfileWdcCollaboration::class);
    }
} 