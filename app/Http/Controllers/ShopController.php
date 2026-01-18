<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;

class ShopController extends Controller
{
    public function index(){
        
        $categories = Category::get();
        $products = Product::where('status', 'active')->orderBy('category_id', 'asc')->get();
        return view('shop.index')->with(['categories'=> $categories, 'products' => $products]);
    }

    

    public function category($item_category){
        $categories = Category::get();
        // = Category::where('category_name', $category);
        //  $products = Product::query()
        //     ->when($category, function ($query) {
        //         $query->where('category_id', $this->cat_id);
        //     })
        //     ->where('status', 'active')
        //     ->get();
        $category_id = Category::where('category_name', $item_category)->first();

        $products = Product::where('category_id',$category_id->id)->where('status', 'active')->get();
        return view('shop.index')->with(['categories'=> $categories, 'products' => $products]);
        // return view('shop.index');
    }

    public function cart(){
        return view('shop.cart');
    }

    
}
