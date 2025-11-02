<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use Livewire\Attributes\On; 

class Carbutton extends Component
{
    public $grand_total = 0;
    public $item_count = 0;
    public $success_message;
    public $error_message;
    public $listeners = ['itemUpdate' => 'updateItemCount', 'cartMessage' => 'showCartMessage'];
    

    public function render()
    {
        return view('livewire.shop.carbutton');
    }

    public function mount()
    {
        $this->updateItemCount();
    }

    public function updateItemCount()
    {
        $cart = $cart = session('cart', []);

        if ($cart) {
            $total = '0.00';
            $itm = 0;
            foreach ($cart as $item) {
                $qty = (string) $item['quantity'];
                $price = (string) $item['price'];
                $subtotal = bcmul($qty, $price, 2);
                $total = $total + $price;
                $itm = $qty + $itm;
            }

            $this->grand_total = $total;
            $this->item_count = $itm;
        }
    }

    public function showCartMessage($title)
    {

        $this->success_message = $title;
    }
    //  #[On('cartMessage')] 
    // public function showMessage($message)
    // {
    //     $this->success_message = $message;
    // }
}
