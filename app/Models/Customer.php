<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Use Authenticatable instead of Model
use Illuminate\Notifications\Notifiable;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $fillable = ['fname', 'lname', 'phone', 'company_name', 'email', 'password'];

    protected $hidden = ['password'];
}
