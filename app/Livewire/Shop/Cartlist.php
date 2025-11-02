<?php

namespace App\Livewire\Shop;

use Livewire\Component;

class Cartlist extends Component
{

    public $cart_items = [];
    public $grand_total = 0;
    
   
    public $listeners = ['cartUpdated' => 'refreshCart'];

    public function render()
    {
        return view('livewire.shop.cartlist');
    }

    public function mount(){
        //   $this->cart_items = session('cart', []);
        // $this->cart_items = session('cart', []);
        $this->refreshCart();
        $this->calculateTotal();
    }

    public function refreshCart(){
          $this->cart_items = session('cart', []);
          $this->calculateTotal();
        
        
    }

    public function removeCartItem($index){

        
        // $cart = session('cart', []);
                    unset($this->cart_items[$index]);
                     $cart = array_values($this->cart_items); // reindex array
                     $this->cart_items = $cart;
                    session()->put('cart', $this->cart_items);
                    $this->dispatch('cartUpdated');

        // if (isset($cart[$index])) {
        //     unset($cart[$index]);
        //     session()->put('cart', $cart);
        //     $this->cart_items = session('cart',[]);

           
        // }

        //  $this->cart_items = session('cart',[]);
        $this->calculateTotal();

    }

    public function calculateTotal(){
        $cart = $cart = session('cart', []);
        
        if ($cart) {
    $total = '0.00';
    

    foreach ($cart as $item) {
        $qty = (string) $item['quantity'];
        $price = (string) $item['price']; 
        $subtotal = bcmul($qty, $price, 2);
        $total = bcadd($total, $subtotal, 2);
       
    }

    $this->grand_total = $total;
    
}

    }
}
