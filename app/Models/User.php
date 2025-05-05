<?php

namespace App\Models;

use Carbon\Carbon;
use DateTimeInterface;
use Hash;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable,SoftDeletes;

    public $table = 'users';

    protected $hidden = [
        'remember_token',
        'password',
    ];

    protected $dates = [
        'email_verified_at',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'email',
        // 'email_verified_at',
        'password',
        // 'remember_token',
        'type',
        'created_at',
        'updated_at',
        'deleted_at',
        'is_approved',
        'approved_at',
        'cnic',
        'telecom_company_id',
        'contact_number',
        'fathers_husbands_name',
        'date_of_birth',
        'gender',
        'marital_status',
        'current_address',
        'current_division_id',
        'current_district_id',
        'current_tehsil_id',
        'permanent_address',
        'permanent_division_id',
        'permanent_district_id',
        'permanent_tehsil_id',
        'same_address',
    ];

    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->format('Y-m-d H:i:s');
    }

    public function getIsAdminAttribute()
    {
        return $this->roles()->where('id', 1)->exists();
    }

    public function getEmailVerifiedAtAttribute($value)
    {
        return $value ? Carbon::createFromFormat('Y-m-d H:i:s', $value)->format(config('panel.date_format').' '.config('panel.time_format')) : null;
    }

    public function setEmailVerifiedAtAttribute($value)
    {
        $this->attributes['email_verified_at'] = $value ? Carbon::createFromFormat(config('panel.date_format').' '.config('panel.time_format'), $value)->format('Y-m-d H:i:s') : null;
    }

    public function setPasswordAttribute($input)
    {
        if ($input) {
            $this->attributes['password'] = app('hash')->needsRehash($input) ? Hash::make($input) : $input;
        }
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function universityProfile()
    {
        return $this->hasOne(UniversityProfile::class);
    }

    public function csoProfile()
    {
        return $this->hasOne(CsoProfile::class);
    }

    public function applicationAvailable()
    {
        return $this->applications()->exists(); // Assuming a user has many applications
    }

    public function applications()
    {
        return $this->hasMany(Application::class); // Adjust the model name as necessary
    }

    public function isAdmin()
    {
        return strtolower($this->role) === 'admin'; // Adjust this based on your role field
    }

    public function isDepartment()
    {
        return strtolower($this->role) === 'department'; // Adjust this based on your role field
    }

    public function secondAcknowledgement()
    {
        return $this->hasOne(SecondAcknowledgement::class, 'user_id', 'id');
    }

    public function isApplicationComplete()
    {
        return $this->applications()->where('status', 1)->exists();
    }
}
