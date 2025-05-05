<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UniversityProfile extends Model
{
    use HasFactory;
    protected $table = 'university_profile';

    protected $fillable = [
        'user_id',
        'website',
        'youtube',
        'instagram',
        'facebook',
        'linkedin',
        'registration_document',
        'focal_person_contact',
        'activity_preference'
    ];

    /**
     * Define the relationship with the User model.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function isProfileComplete()
    {
        $requiredFields = [
            'website',
            'youtube',
            'instagram',
            'facebook',
            'linkedin',
            'focal_person_contact'
        ];

        foreach ($requiredFields as $field) {
            if (empty($this->$field)) {
                return false;
            }
        }

        return true;
    }

    // Add an accessor for formatted contact
    public function getFormattedContactAttribute()
    {
        if ($this->focal_person_contact) {
            $number = (string) $this->focal_person_contact;
            // Ensure the number starts with 92
            if (strlen($number) >= 12) {
                return '+' . substr($number, 0, 2) . '-' 
                    . substr($number, 2, 3) . '-' 
                    . substr($number, 5);
            }
        }
        return 'Not provided';
    }

    public function campuses()
    {
        return $this->hasMany(UniversityCampus::class);
    }
}
