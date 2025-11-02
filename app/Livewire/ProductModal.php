<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class ProductModal extends Component
{
    public $show = false;
    public $productId;

    protected $listeners = ['loadProduct', 'closeProduct'];

    public function loadProduct($id)
    {
        $this->productId = $id;
        $this->show = true;
    }

    public function closeProduct()
    {
        $this->reset(['show', 'productId']);
    }

   
    public function render()
    {
        return view('livewire.product-modal');
    }

    public function getCategory(){
        return Category::where('id', $this->category_id)->first(); 
    }
}
