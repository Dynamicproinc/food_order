<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Product extends Model
{
   

     public function getCategory(){
        return Category::where('id', $this->category_id)->first(); 
    }

    public function getVariants(){
        return Variant::where('product_id', $this->id)->get();
    }

     public function getGroupedOption(){
    //   return Variant::select('option_id', 'value', 'price', DB::raw('COUNT(*) as total'))
    //     ->groupBy('option_id', 'value', 'price')
    //     ->where('product_id', $this->id)
    //     ->get();
     return Variant::select('id','product_id', 'option_id', 'value','description', 'price')
        ->where('product_id', $this->id)
        ->orderBy('option_id')
        ->get()
        ->groupBy('option_id');

    }


    public function getChoices(){
        return ProductChoice::where('product_id', $this->id)->get();
    }
}
