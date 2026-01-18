<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'score',
        'comment',
        'status',
    ];

    public function getUser(){
        return User::where('id', $this->user_id)->first();
    }

    public function getPRoduct(){
        return Product::where('id', $this->product_id)->first();
    }
}
