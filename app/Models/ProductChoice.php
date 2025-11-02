<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductChoice extends Model
{
    //

    protected $fillable = [
        'Choice_id',
        'price',
        'quantity',
        'product_id',
    ];

    public function getChoiceName(){
        return Choice::where('id', $this->Choice_id)->first();
    }
}
