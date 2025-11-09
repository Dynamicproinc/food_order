<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;
use App\Models\Product;
use App\Models\SalesOrder;

class AdminController extends Controller
{
    public function addProduct(){
        return view('admin.products.addproduct');
    }
    public function products(){
        $products = Product::paginate(20);
        return view('admin.products.index')->with('products', $products);
    }

    public function kitchen(){
        return view('admin.kitchen.kitchen');
    }

    public function editProduct($id){
        $product_id = $id;
        return view('admin.products.edit')->with('product_id', $product_id);
    }

    public function addCoupone(){
        return view('admin.products.addcoupon');
    }

    public function pointManager(){
        return view('admin.point.pointmanager');
    }

    public function orders(){

        $orders = SalesOrder::latest()->paginate(50);
        return view('admin.orders.order')->with('orders', $orders);
    }

    


   
}
