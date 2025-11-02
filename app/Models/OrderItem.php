<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
        protected $casts = [
            'variants' => 'array',
            'choices' => 'array',
        ];

        protected $fillable = [
            'sales_order_id', 
            'product_id',
            'price',
            'quantity',
            'variants',
            'choices'
        ];

        public function getProduct(){
            return Product::where('id', $this->product_id)->first();
        }
}
