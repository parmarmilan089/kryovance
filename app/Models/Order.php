<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_number',
        'customer_id',
        'billing_id',
        'total_amount',
        'payment_method',
        'payment_status',
        'subtotal',
        'total',
        'status'
    ];

    public function billingDetails()
    {
        return $this->belongsTo(BillingDetails::class, 'billing_id');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
