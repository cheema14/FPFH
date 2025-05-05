<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Division extends Model
{
    use HasFactory;

    protected $table = 'divisions';

    protected $fillable = [
        'province_id',
        'bench_id',
        'name',
        'status',
        'deleted_at',
        'is_deleted',
        'created_at',
        'updated_at',
    ];

    /**
     * Get the districts for the division.
     */
    public function districts(): HasMany
    {
        return $this->hasMany(District::class, 'division_id');
    }
} 