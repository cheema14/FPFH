<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tehsil extends Model
{
    use HasFactory;

    protected $table = 'tehsils';

    protected $fillable = [
        'tehsil_name',
        'tehsil_name_Urdu',
        'district_idFk',
        'status',
        'is_deleted',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    // Define relationships
    public function district()
    {
        return $this->belongsTo(District::class, 'district_idFk');
    }
} 