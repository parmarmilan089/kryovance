<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerRole extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'user_type',
        'is_deleted',
    ];

    public function customers()
    {
        return $this->hasMany(Customer::class);
    }
}
