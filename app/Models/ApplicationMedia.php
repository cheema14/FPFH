<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplicationMedia extends Model
{
    use HasFactory;

    protected $table = 'application_medias'; // Specify the table name if it doesn't follow Laravel's naming convention

    protected $fillable = [
        'user_id',
        'application_id',
        'file_path',
        'file_name',
        'file_type',
        'document_type',
        'secure_file_path',
    ];

    // Define relationships if needed
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function application()
    {
        return $this->belongsTo(Application::class);
    }
}
