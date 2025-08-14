<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{ 
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'product_id',
        'user_id',
        'customer_name',
        'customer_email',
        'customer_address',
        'customer_mobile_phone',
        'payment_receipt', // New field for payment receipt
        'quantity',
        'total_price',
        'status',
    ];

    /**
     * Get the product associated with the order.
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Get the user that owns the order (if applicable).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
