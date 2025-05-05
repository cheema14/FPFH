<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CsoProfileSlot extends Model
{
    use HasFactory;

    protected $fillable = [
        'cso_profiles_id',
        'from_date',
        'to_date',
    ];

    public function profile()
    {
        return $this->belongsTo(CsoProfile::class, 'cso_profiles_id');  
    }
}
