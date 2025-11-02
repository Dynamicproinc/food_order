<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CouponDiscount extends Model
{
    // Mass assignable fields
    protected $fillable = [
        'code',
        'description',
        'discount_type',
        'discount_value',
        'max_discount_amount',
        'min_order_amount',
        'usage_limit',
        'per_user_limit',
        'valid_from',
        'valid_until',
        'is_active',
        'used_count',
    ];

    // Optional: Cast fields to proper types
    protected $casts = [
        'valid_from' => 'datetime',
        'valid_until' => 'datetime',
        'is_active' => 'boolean',
        'discount_value' => 'float',
        'max_discount_amount' => 'float',
        'min_order_amount' => 'float',
        'used_count' => 'integer',
        'usage_limit' => 'integer',
        'per_user_limit' => 'integer',
    ];
}
