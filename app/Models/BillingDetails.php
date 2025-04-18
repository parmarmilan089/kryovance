<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'order_id',
        'first_name',
        'last_name',
        'email',
        'company_name',
        'phone',
        'address',
        'order_notes',
        'city',
        'country',
        'zip_code'
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
