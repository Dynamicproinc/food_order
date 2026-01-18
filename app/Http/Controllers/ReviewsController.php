<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class ReviewsController extends Controller
{
    public function showReviews($slug){

    $product = Product::where('slug', $slug)->where('status', 'active')->first();
    if(!$product){
        return abort(404);
    }
        
        return view('shop.reviews')->with('product', $product);
    }
}
