<?php

namespace App\Livewire\Spa\App;

use Livewire\Component;

class Cart extends Component
{
    public $cart_items = [];
    public $cart_total;
    public $total_items;

    public function render()
    {
        return view('livewire.spa.app.cart')->layout('layouts.app-dark');
    }

    public function mount()
    {
        $this->cart_items = session('cart', []);
        $this->calculateTotal();
        if (! $this->cart_items) {
            return redirect()->to(route('spa.shop'));

        }
    }

    public function removeCartItem($index)
    {

        if ($this->cart_items) {
            unset($this->cart_items[$index]);
            $cart = array_values($this->cart_items); // reindex array
            $this->cart_items = $cart;
            session()->put('cart', $this->cart_items);
            $this->calculateTotal();
        } else {
            dd('dsds');
        }
    }

    public function calculateTotal()
    {
        if (session('cart')) {
            foreach (session('cart', []) as $key => $item) {
                $this->cart_total = $this->cart_total + ($item['price'] * $item['quantity']);
                $this->total_items = $this->total_items + $item['quantity'];
            }
        }
    }
}
