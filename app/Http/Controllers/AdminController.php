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

    public function index(){
        // pass data to view via data array yearly

        // get this year total sales for each month for chart
        $sales = SalesOrder::selectRaw('MONTH(created_at) as month, SUM(net_total) as total_amount')
        ->whereYear('created_at', Carbon::now()->year)
        ->where('status', 'dispatched')
        ->groupBy('month')
        ->get();

        // get numbers of times each month has been ordered for chart
        $orderCount = SalesOrder::selectRaw('MONTH(created_at) as month, COUNT(*) as order_count')
        ->whereYear('created_at', Carbon::now()->year)
        ->where('status', 'dispatched')
        ->groupBy('month')
        ->get();

        // get user registration count for each month for chart
        $userRegistrationCount = User::selectRaw('MONTH(created_at) as month, COUNT(*) as user_registration_count')
        ->whereYear('created_at', Carbon::now()->year)
        ->groupBy('month')
        ->get();

        $data = [
            // month in words
            'month' => $sales->pluck('month')->map(function($month) {
                return date('F', mktime(0, 0, 0, $month, 1));
            }),
            'total_amount' => $sales->pluck('total_amount'),
            'order_count' => $orderCount->pluck('order_count'),
            'user_registration_count' => $userRegistrationCount->pluck('user_registration_count'),
        ];

       
        return view('admin.index')->with('data', $data);
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
       ->paginate(15);
               

        return view('admin.orders.order')->with('orders', $orders);
    }

    public function showOrders($id){
        $order = SalesOrder::findOrFail($id);
        return view('templates.orderconfirmation')->with('order', $order);
    }

    public function users(Request $request){
        $keyquery = $request->input('q');
        if($keyquery){
            $users = User::where('name', 'LIKE', "%$keyquery%")
            ->orWhere('email', 'LIKE', "%$keyquery%")
            ->orWhere('last_name', 'LIKE', "%$keyquery%")
            ->latest()
            ->paginate(20);
            return view('admin.users.user')->with('users', $users);
            
        }

        $users = User::latest()->paginate(20);
        return view('admin.users.user')->with('users', $users);
    }

    public function userDetails($id){
        $user = User::findOrFail($id);
        return view('admin.users.userdetails')->with('user', $user);
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
    public function reviews(){
        return view('admin.products.reviews');
    }
   

    


   
}
