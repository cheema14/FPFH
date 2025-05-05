<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondAcknowledgement extends Model
{
    use HasFactory;

    public $table = 'second_acknowledgement_checks';

    protected $fillable = [
        'user_id',
        'punjab_resident',
        'same_district_application',
        'no_plot_associated',
        'not_blacklisted',
        'no_criminal_record',
    ];

    // Define relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
