<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    public $table = 'complaints';

    protected $fillable = [
        'name',
        'father_name',
        'contact_number',
        'email',
        'cnic',
        'division',
        'district',
        'feedback',
    ];
}
