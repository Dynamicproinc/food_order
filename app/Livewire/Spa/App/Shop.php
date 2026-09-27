<?php

namespace App\Livewire\Spa\App;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Shop extends Component
{

    public $categories;
    public $selected_category_id;
    // public $selected_category_id = 1;


    public function render()
    {


        $products = Product::query();

        if (!empty($this->selected_category_id)) {
            $products->where('category_id', $this->selected_category_id);
        }

        return view('livewire.spa.app.shop', [
            'products' => $products->get(),
        ])->layout('layouts.app-dark');
    }

    public function mount($category = null)
    {
       
        $this->categories = Category::all();
        $cate = Category::where('category_name', $category)->first();
        if($cate){
            $this->selected_category_id = $cate->id;
        }
        
    }
}
