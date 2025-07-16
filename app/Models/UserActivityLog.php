<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActivityLog extends Model {

    protected $table = 'user_activity_logs';
    protected $fillable = [
        'title'
    ];

    use HasFactory;
}
