<?php        

namespace App\Models;   

use Illuminate\Database\Eloquent\Model;

class CsoProfile extends Model
{
    protected $table = 'cso_profiles';
    protected $fillable = [
        'user_id',
        'website',
        'youtube',
        'instagram',
        'facebook',
        'linkedin',
        'registration_document',
        'focal_person_contact',
        'wdc_collaboration_id',
        'organization_name'
    ];

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
            'focal_person_contact',
            'registration_document',
            'wdc_collaboration_id'
        ];

        foreach ($requiredFields as $field) {
            if (empty($this->$field)) {
                return false;
            }
        }

        return true;
    }
    public function divisions()
    {
        return $this->hasMany(CsoProfileDivision::class);
    }

    public function districts()
    {
        return $this->hasMany(CsoProfileDistrict::class);
    }
    public function expertiseAreas()
    {
        return $this->hasMany(CsoProfileAreaExeperty::class);
    }
    public function getFormattedContactAttribute()
    {
        if ($this->focal_person_contact) {
            $number = (string) $this->focal_person_contact;
            return '+' . substr($number, 0, 2) . '-' 
                . substr($number, 2, 3) . '-' 
                . substr($number, 5);
        }
        return null;
    }
    public function activities()
    {
        return $this->hasMany(CsoProfileActivity::class);
    }
    public function facilities()
    {
        return $this->hasMany(CsoProfileFacility::class);
    }
    public function wdcCollaboration()
    {
        return $this->belongsTo(WdcCollaboration::class);
    }
} 