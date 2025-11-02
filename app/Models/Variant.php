<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Variant extends Model
{
    // fillables
    protected $fillable = [
        'option_id',
        'value',
        'price',
        'quantity',
        'product_id'
    ];


    public function getOptionName(){
        return Options::where('id', $this->option_id)->first();
    }
    

    

   
}
