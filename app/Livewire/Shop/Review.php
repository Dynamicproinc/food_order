<?php

namespace App\Livewire\Shop;

use Livewire\Component;
use App\Models\Rating;
use Livewire\WithPagination;

class Review extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $score = null;
    public $product_id ;
    public $comment;
    public $success = false;
    public function render()
    {
        return view('livewire.shop.review');
    }

    public function mount($product){
        
        $this->product_id = $product->id;
    }
    public function submit(){

        if (!auth()->check()) {
    return redirect()->guest(route('login'));
}

        $this->validate([
            'score' => 'required|min:0|max:5',
           'comment' => 'required|string|max:1000',
        ]
           

        );
      

        $review = Rating::create([
                'user_id' => auth()->user()->id,
                'product_id' => $this->product_id,
                'score' => $this->score,
                'comment' => $this->comment,
               

        ]);

        if($review){
            $this->reset(['score','comment']);
            $this->success = true;
            
        }

    }
}
