<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductChoice;
use App\Models\Variant;



class Index extends Component
{
    public $categories;
    public $selected_category_id = 1;
    public $category;
    public $product_modal = false;
    public $selected_product;
    public $variants = [];
    public $variant = [];
    public $grand_total;
    public $choices = [];
    public $quantity = 1;
    public $cart_items = [];
    public $cart_modal = false;
    public $products;
    public $cat_id;
    public $success_message;
    public $error_message;

    protected $queryString = [
        'category' => ['except' => ''] // optional, removes empty category from URL
    ];


    public function render()
    {
        // $products = Product::query()
        //     ->when($this->category, function ($query) {
        //         $query->where('category_id', $this->category);
        //     })
        //     ->where('status', 'active')
        //     ->get();

        // return view('livewire.shop.index', [
        //     'products' => $products,
        // ]);
        return view('livewire.shop.index');
    }

    public function mount($products)
    {
        // dd($products);
        // $this->cat_id = Category::where('category_name', $category);
        //  $products = Product::query()
        //     ->when($category, function ($query) {
        //         $query->where('category_id', $this->cat_id);
        //     })
        //     ->where('status', 'active')
        //     ->get();
        $this->products = $products;
        
        $this->categories = Category::all();
        $this->variant = [];
        $this->refreshCart();
        // dd($this->selected_product->getGroupedOption());
    }
    public function refreshCart(){
          $this->cart_items = session('cart', []);
        //   $this->calculateTotal();
        
        
    }

    public function calculateTotal()
    {

        // $ = $this->selected_product->discounted_price;
        $total_v = 0;

        foreach ($this->variant as $option_id => $item) {
            // find the database value
            $v = Variant::findOrFail($item);
            $total_v = $v->price + $total_v;
        }

        $total_c = 0;
        foreach ($this->choices as $item) {
            $pc = ProductChoice::findOrFail($item);
            $total_c = $pc->price + $total_c;
        }




        $pprice = $this->selected_product->discounted_price;


        $this->grand_total = ($pprice + $total_v + $total_c) * $this->quantity;
    }



    public function selectCategory($id)
    {
        $this->selected_category_id = $id;
    }

    public function selectProduct($id)
    {
        //open the model

        // load the product details
        $this->selected_product = Product::where('id', $id)->first();
        $this->grand_total = $this->selected_product->discounted_price;
        $this->quantity = 1;
        // $this->selected_product_image = $product->image_path;
        // set first item as checked
        //    $this->resetVariant();
        if (count($this->selected_product->getGroupedOption()) > 0) {

            foreach ($this->selected_product->getGroupedOption() as $option_id => $variants) {
                $this->variant[$option_id] = $variants->first()->id;
            }
        }

        $this->calculateTotal();
        $this->openModal();
    }

    public function resetVariant()
    {

        //   if(count($this->selected_product->getGroupedOption()) > 0){

        //     foreach ($this->selected_product->getGroupedOption() as $option_id => $variants) {
        //        $this->variant[$option_id] = $variants->first()->id;
        //    }
        // }
        $this->variant = [];
        $this->choices = [];


        // reset all variants and choices




    }

    public function openModal()
    {
        $this->product_modal = true;
    }

    public function closeModal()
    {

        $this->product_modal = false;
        // $this->resetVariant();
        $this->variant = [];
        $this->choices = [];
        $this->selected_product = null;
    }

    public function increment()
    {
        $this->quantity++;
        $this->calculateTotal();
    }
    public function decrement()
    {
        $this->quantity--;
        if ($this->quantity < 1) {
            $this->quantity = 1;
            $this->calculateTotal();
            return null;
        }
        $this->calculateTotal();
    }
    private function sortRecursive(&$array)
    {
        if (!is_array($array)) {
            return;
        }

        // Check if array is associative or numeric
        $isAssoc = array_keys($array) !== range(0, count($array) - 1);

        if ($isAssoc) {
            ksort($array);
        } else {
            sort($array);
        }

        foreach ($array as &$value) {
            if (is_array($value)) {
                $this->sortRecursive($value);
            }
        }
    }


    public function addCart()
    {

        if (count($this->selected_product->getVariants())) {
            $this->validate([
                'variant' => 'required'
            ]);
        }

        $product_id = $this->selected_product->id;
        $cart = session()->get('cart', []);
        //need to be the aphebetical 
        // shorting 



        $choices = $this->choices;

        // sortRecursive($choices);

        $this->sortRecursive($choices);




        // Create a unique key based on product + variant + choices
        $unique_key = $product_id . '-' . md5(json_encode($this->variant) . json_encode($choices));


        if (isset($cart[$unique_key])) {
            // If same combination exists, increase quantity
            $cart[$unique_key]['quantity'] += $this->quantity;
        } else {
            // Add as new item
            $cart[$unique_key] = [
                'product_id' => $product_id,
                'quantity' => $this->quantity,
                'price' => $this->grand_total,
                'variants' => $this->variant,
                'choices' => $choices,
            ];
        }
        $this->variant = [];
        $this->choices = [];
        
        session()->put('cart', $cart);
        $this->dispatch('itemUpdate');
        $this->dispatch('pop');
        // $this->dispatch('cartUpdated');
        // $this->dispatch('open-nav');
        $this->closeModal();
        // $this->cart_modal = true;
        // $this->success_message = "Item added to the cart";
        $this->dispatch('cartMessage',title: 'Cart item has been updated');


    }

    public function openCartModal()
    {
        $this->cart_modal = true;
    }

    public function closeCartModal()
    {
        $this->cart_modal = false;
    }
    public function removeCartItem($index){

        
        
                    unset($this->cart_items[$index]);
                     $cart = array_values($this->cart_items); // reindex array
                     $this->cart_items = $cart;
                    session()->put('cart', $this->cart_items);
                    $this->dispatch('cartUpdated');

        
       
    }
}
