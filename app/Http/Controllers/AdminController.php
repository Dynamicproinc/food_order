<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDO;
use App\Models\Product;
use App\Models\SalesOrder;
use Carbon\Carbon;
use App\Models\User;

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

    //    $orders = SalesOrder::whereDate('created_at', Carbon::today())
    //     ->latest()
    //     ->paginate(50);
       $orders = SalesOrder::latest()
       ->paginate(50);
               

        return view('admin.orders.order')->with('orders', $orders);
    }

    public function showOrders($id){
        $order = SalesOrder::findOrFail($id);
        return view('templates.orderconfirmation')->with('order', $order);
    }

    public function users(){
        $users = User::latest()->paginate(20);
        return view('admin.users.user')->with('users', $users);
    }

    public function orderNotification(){
        return view('admin.orders.ordernotification');
    }

    public function changeShostatus(){
        return view('admin.setting.shopstatus');
    }

    // extrabct all user emails
    public function extractEmails(){
        $users = User::all();
        $emails = [];
        foreach($users as $user){
            $emails[] = $user->email;
        }
        // to text-file
        $file = fopen("user_emails.txt", "w");
        foreach($emails as $email){
            // example ex1@gmail.com, ex2@gmail.com

            fwrite($file, $email . ",");   
        }
        fclose($file);
        return response()->download(public_path('user_emails.txt'));
    }

   

    


   
}
