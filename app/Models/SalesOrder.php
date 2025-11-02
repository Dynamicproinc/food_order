<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class SalesOrder extends Model
{

     protected $fillable = [
        'daily_order_number', 'created_at',
    ];

    public function getUser(){
        return User::where('id', $this->user_id)->first();
    }

    public function getItems(){
        return OrderItem::where('sales_order_id', $this->id)->get();
    }
public static function boot()
    {
        parent::boot();

        static::creating(function ($order) {
            $today = now()->toDateString();

            // Find the last order number for today
            $lastOrder = self::whereDate('created_at', $today)
                ->lockForUpdate() // prevent race conditions
                ->max('daily_order_number');

            $order->daily_order_number = $lastOrder ? $lastOrder + 1 : 1;
            $order->created_at = $today;
        });
    }

}
