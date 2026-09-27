<?php

namespace App\Livewire\Darktheme\Shop;

use Livewire\Component;
use Livewire\Attributes\On;
class Index extends Component
{

    public $show;

    public function render()
    {
        return view('livewire.darktheme.shop.index')->layout('layouts.app-dark');
    }

    #[On('open-product')]
    
public function openProduct($slug)
{
   
    $this->show = true;
}


}
