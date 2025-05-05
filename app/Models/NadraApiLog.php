<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NadraApiLog extends Model
{
    use HasFactory;

    public $table = 'nadra_api_logs';

    protected $fillable = [
        'cnic', 'request', 'response', 'success_or_error', 'is_found', 'curl_error_msg', 'api_name',
    ];
}
