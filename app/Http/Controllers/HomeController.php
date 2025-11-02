<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SalesOrder;
use App\Models\UserPoint;
use App\Models\UserPointTotal;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $sales_orders = SalesOrder::where('user_id', auth()->user()->id)->latest()->orderBy('daily_order_number','desc')->paginate(5);

        $total_points = UserPointTotal::where('user_id', auth()->user()->id)->first();

        // return $up;

        return view('home')->with(['sales_orders' => $sales_orders, 'total_points' => $total_points]);
    }

    public function viewOrder($slug){
        $order = SalesOrder::where('slug', $slug)->where('user_id', auth()->user()->id)->first();
        if($order){
            return view('templates.orderconfirmation')->with('order', $order);
        } 

        return abort(404);
        
    }
}
