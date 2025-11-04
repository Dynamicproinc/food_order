<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use App\Models\City;
use App\Models\SalesOrder;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\UserPoint;
use App\Models\UserPointTotal;
use Illuminate\Support\Str;
use App\Mail\OrderConfirmation;
use Illuminate\Support\Facades\Mail;
use App\Models\CouponDiscount;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{
    public $cart_items = [];
    public $grand_total = 0;
    public $first_name, $last_name, $email;
    public $cities;
    public $telephone;
    public $order_type = 'pickup';
    public $pickup_time;
    public $city, $address, $address_2;
    public $discount = 0;
    public $delivery = 0;
    public $net_total = 0;
    // public $coupon_code;
    public $discount_value;
    public $user_points;
    public $min_coupon_limit = 10;
    public $pay_coupon = 0, $coupon_base = 10;

    // 
    public $coupon_code;
    public $order_total;
    public $discountAmount = 0;
    public $final_total = 0;
    public $c_message = '';
    public $success = false;

    // 



    public function render()
    {
        return view('livewire.shop.cart');
    }

    public function mount()
    {
        $this->cart_items = session('cart', []);
        $this->calculateTotal();
        $this->first_name = auth()->user()->name;
        $this->last_name = auth()->user()->last_name;
        $this->email = auth()->user()->email;
        //load cities
        $this->cities = City::all();
        // point availabilty and eligiblity
        $this->user_points = UserPointTotal::where('user_id', auth()->user()->id)->first()?->balance;
        

        
    }

    public function removeCartItem($index)
    {



        unset($this->cart_items[$index]);
        $cart = array_values($this->cart_items); // reindex array
        $this->cart_items = $cart;
        session()->put('cart', $this->cart_items);
        $this->dispatch('itemUpdate');
        $this->dispatch('pop');
        $this->dispatch('cartMessage',title: 'Cart item has been removed');
        // $this->dispatch('cartMessage', title: 'Cart item removed');
        $this->calculateTotal();
    }
    public function calculateTotal()
    {
        $cart = $cart = session('cart', []);

        if ($cart) {
            $total = 0;


            foreach ($cart as $item) {
                // $qty = (string) $item['quantity'];
                // $price = (string) $item['price'];
                // $subtotal = bcmul($price, 2);
                // $total = bcadd($total, $subtotal, 2);
                $qty = (string) $item['quantity'];
                $price = (string) $item['price'];
                 $subtotal = bcmul($qty, $price, 2);
                $total = $total + $subtotal;
            }

            if($this->grand_total < 69){
                $this->order_type = 'pickup';
            }
            
            $this->grand_total = $total;
            $this->discount_value = ($this->grand_total * $this->discount) / 100;

            $this->net_total = ($this->grand_total + $this->delivery) - $this->discount_value;
        }
    }

    public function saveOrder(){
    
        
        //first must calcluate latest cart total
        $this->calculateTotal();

        if ($this->order_type == 'pickup') {
            $this->validate([
                'pickup_time' => 'required|after_or_equal:now',
            ]);
        }

        if ($this->order_type == 'delivery') {
            $this->validate([
                'city' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'address_2' => 'required|string|max:255',
            ]);
        }

        $this->validate([
            'telephone' => 'required|string|max:255',
            'order_type' => 'required',
            
        ]);

        
        // make order

        $order = new SalesOrder;
        $order->user_id = auth()->user() ? auth()->user()->id : 0;
        $order->telephone = $this->telephone;
        $order->order_type = $this->order_type;
        $order->pickup_time = $this->pickup_time;
        $order->city_id = $this->city;
        $order->address_1 = $this->address;
        $order->address_2 = $this->address_2;
        $order->sub_total = $this->grand_total;
        $order->discount = $this->discount;
        $order->delivery = $this->delivery;
        $order->net_total = $this->net_total;
        $order->slug = Str::random(15);
        if($order->save()){
            // save sales order items
            //fetching session
            $cart = session('cart',[]);
            if($cart){

                $total_points = 0;

                foreach($cart as $item){
                    $sales_items = OrderItem::create([
                        'sales_order_id' => $order->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['price'],
                        'variants'=> $item['variants'],
                        'choices'=> $item['choices']
                    ]);

                    //point calculation
                    //find product score 
                    $points = Product::where('id', $item['product_id'])->first()->points;
                    $single_item_point = $item['quantity'] * $points;
                    $total_points = $total_points + $single_item_point;

    
                }

                // add user earned points 
                $user_points = UserPoint::create([
                    'user_id' => auth()->user() ? auth()->user()->id : 0,
                    'order_id' => $order->id,
                    'points'=>$total_points,
                    
                ]);

                //remove the points
                if($this->pay_coupon == 1){
                   
                    $updated_user_points = UserPointTotal::where('user_id', auth()->id())->first()->balance ?? 0;
                    
                UserPointTotal::updateOrCreate(
                    ['user_id' => auth()->id()], // Condition
                    ['balance' => $updated_user_points - 10] // Values to update or insert
                );

                }

                ////////////////////////////////////ONLY AFTER PAY /////////////////////////////////////////////
                // $updated_user_points = UserPointTotal::where('user_id', auth()->id())->first()->balance ?? 0;

                
                // UserPointTotal::updateOrCreate(
                //     ['user_id' => auth()->id()], // Condition
                //     ['total' => $updated_user_points + $total_points] // Values to update or insert
                // );
                ////////////////////////////////////////////////////////////////////////////////////////////////


                

                
            



            }


            // clear cart
            // send email to customer
           $sales_order_for_email = SalesOrder::where('id', $order->id)->where('user_id', auth()->user()->id)->first();
            //mail to customer
             Mail::to(auth()->user()->email)
             ->bcc('hello@jobwino.com')
             ->send(new OrderConfirmation($sales_order_for_email));

            // 
            session()->forget('cart');

            // redirections

            return redirect()->to(route('myaccount.vieworder',$order->slug));

        }





        
    }

    public function applyCoupon(){
        $this->validate([
            'coupon_code' => 'required',
        ]);

        $user = Auth::user();
        $couponCode = $this->coupon_code;
        $orderTotal = $this->grand_total;

        $coupon = CouponDiscount::where('code', $couponCode)->first();
        // Check if coupon exists
        if (!$coupon) {
            $this->resetCoupon();
            $this->c_message = 'Invalid coupon code.';
            return;
        }
        // Check if coupon is active
        if (!$coupon->is_active) {
            $this->resetCoupon();
            $this->c_message = 'This coupon is no longer active.';
            return;
        }
          $now = now();

        // Check date validity
        if ($now->lt($coupon->valid_from) || $now->gt($coupon->valid_until)) {
            $this->resetCoupon();
            $this->c_message = 'This coupon is not valid at this time.';
            return;
        }

        // Check usage limit
        if ($coupon->usage_limit !== null && $coupon->used_count >= $coupon->usage_limit) {
            $this->resetCoupon();
            $this->c_message = 'This coupon has reached its usage limit.';
            return;
        }

        // Check per-user limit
        if ($coupon->per_user_limit && $user) {
            $userUsage = \DB::table('coupon_users')
                ->where('user_id', $user->id)
                ->where('coupon_id', $coupon->id)
                ->count();

            if ($userUsage >= $coupon->per_user_limit) {
                $this->resetCoupon();
                $this->c_message = 'You have already used this coupon.';
                return;
            }
        }
        // Check minimum order amount
        if ($coupon->min_order_amount && $orderTotal < $coupon->min_order_amount) {
            $this->resetCoupon();
            $this->c_message = 'Minimum order amount not met for this coupon.';
            return;
        }
        // Calculate discount
        $discountAmount = 0;
        if ($coupon->discount_type === 'percentage') {
            $this->discount = $this->discount + $coupon->discount_value;
            $discountAmount = ($orderTotal * $coupon->discount_value) / 100;
            if ($coupon->max_discount_amount && $discountAmount > $coupon->max_discount_amount) {
                $discountAmount = $coupon->max_discount_amount;
            }
        } else {
            
            $discountAmount = $coupon->discount_value;
            $this->discount_value =  $coupon->discount_value;
        }

        $discountAmount = min($discountAmount, $orderTotal);
        // 
        //  \DB::table('coupon_user')->insert([
        //     'user_id' => $user->id,
        //     'coupon_id' => $coupon->id,
        //     'used_at' => now(),
        // ]);
        // 
         $this->discount_value =  $coupon->discount_value;
        // $this->discountAmount = round($discountAmount, 2);

        // $this->discount = $this->discount + $this->discountAmount;
        // $this->final_total = round($orderTotal - $discountAmount, 2);
        $this->dispatch('cartMessage',title: 'Coupon applied successfully!');
        // $this->c_message = "Coupon applied successfully!";
        $this->success = true;
        $this->calculateTotal();
    }

    private function resetCoupon()
    {
        $this->discountAmount = 0;
        $this->final_total = $this->order_total;
        $this->success = false;
    }

    public function payCoupon(){
       if($this->pay_coupon == 1){
        //check avalibela balance enought for the transction
        if($this->user_points >=10){
            $this->discount = $this->discount + 10;
            $this->dispatch('cartMessage',title: 'Coupon added');
        }

       }else{
         $this->discount = $this->discount - 10;
         $this->dispatch('cartMessage',title: 'Coupon removed');
       }
       
       $this->calculateTotal();
    }

    // public function 
}
