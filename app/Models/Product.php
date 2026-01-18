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
        return ProductChoice::where('product_id', $this->id)->orderBy('price','asc')->get();
    }

    public function getRatingScore(){

        // rating calculation for the product
       $rating_grouped_by = Rating::where('product_id', $this->id)
       ->where('status', 'approved')
    ->select('score', \DB::raw('count(*) as total'))
    ->groupBy('score')
    ->orderBy('score', 'asc') 
    ->get();
    // calction for average score
    if( $rating_grouped_by->isEmpty()){
        return [
            'average_score' => 0,
            'total_ratings' => 0,
            'integer_part' => 0,
        ];
    }
    $total_score_value = 0;
    $total_number_of_ratings = 0;

    foreach($rating_grouped_by as $item){

        $val = $item->score * $item->total;
        $total_number_of_ratings += $item->total;
        $total_score_value =+ $val;
    }
      $avg_score =  $total_score_value / $total_number_of_ratings;
      $round_avg =$avg_score;
      $single_number = explode('.', $round_avg);
      $data = [
        'average_score' => $round_avg,
        'total_ratings' => $total_number_of_ratings,
        'integer_part' => $single_number[0],
      ];
    //   dd( $data );
    return $data;
    }

    public function getRatings(){
        return Rating::where('product_id', $this->id)->where('status', 'approved')->latest()->paginate(20);
    }
}

  


