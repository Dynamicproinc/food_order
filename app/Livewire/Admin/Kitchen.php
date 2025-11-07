<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\SalesOrder;
use Carbon\Carbon;
use App\Models\UserPoint;
use App\Models\UserPointTotal;
use App\Models\PointTransaction;

class Kitchen extends Component
{

    // public $orders;
    public $ready_orders;

    public function render()
    {

        return view('livewire.admin.kitchen',[
             'orders'=> SalesOrder::whereDate('created_at', Carbon::today())->whereNotIn('status', ['ready', 'dispatched'])->orderBy('daily_order_number', 'desc')->get(),
        ]);
    }

    public function mount(){
        $this->fetchorders();
    }
    
    public function fetchOrders(){
        // $orders = SalesOrder::whereDate('created_at', Carbon::today())->whereNotIn('status', ['ready', 'dispatched'])->orderBy('daily_order_number', 'desc')->get();
        // $this->orders = $orders;
        $ready_orders = SalesOrder::whereDate('created_at', Carbon::today())->where('status', 'ready')->orderBy('updated_at', 'desc')->get();
        $this->ready_orders = $ready_orders;



        

    }

    public function orderAccepted($id){
        $order = SalesOrder::findOrFail($id);
        $order->status = 'accepted';
        $order->save();
         $this->fetchorders();
    }
    public function orderReady($id){
        $order = SalesOrder::findOrFail($id);
        $order->status = 'ready';
        $order->save();
         $this->fetchorders();
    }
    public function orderDispatch($id){
        $order = SalesOrder::findOrFail($id);
        $order->status = 'dispatched';
        if($order->save()){

            // get user poiints
            UserPoint::where('order_id', $order->id)->update(['status' => 'active']);
    
            $user_points_sum = UserPoint::where('order_id', $order->id)->sum('points');
            $ex_bal = UserPointTotal::where('user_id', $order->user_id)->first();
            if($ex_bal){

                $ex_bal->balance = $ex_bal->balance + $user_points_sum;
                $ex_bal->save();
            }else{
                $u_point = new UserPointTotal;
                $u_point->user_id = $order->user_id ;
                $u_point->balance = $user_points_sum;
                $u_point->save();
            }
            // add transaction
            PointTransaction::credit($order->user_id,$user_points_sum,"Copon Reward at Store");
            // send email to customer
        }



        
        
        

         $this->fetchorders();
    }



    


}
