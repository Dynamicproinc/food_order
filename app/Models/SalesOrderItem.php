<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SalesOrderItem extends Model
{
            protected $casts = [
            'variants' => 'array',
            'choices' => 'array',
        ];

        protected $fillable = [
            'sales_order_item', //must be sales order id
            'price',
            'quantity',
            'variants',
            'choices'
        ];
}
