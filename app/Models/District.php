<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class District extends Model
{
    use HasFactory;

    protected $table = 'districts';

    protected $fillable = [
        'ref_district_id',
        'division_id',
        'bench_id',
        'name',
        'name_urdu',
        'status',
        'is_deleted',
        'deleted_at',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the division that owns the district.
     */
    public function division(): BelongsTo
    {
        return $this->belongsTo(Division::class, 'division_id');
    }

    public function tehsils()
    {
        return $this->hasMany(Tehsil::class, 'district_idFk');
    }
} 