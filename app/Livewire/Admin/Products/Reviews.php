<?php

namespace App\Livewire\Admin\Products;

use Livewire\Component;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Support\Facades\Redirect;
use Livewire\WithPagination;

class Reviews extends Component
{
    // public $reviews = [];
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
         $reviews = Rating::orderBy('created_at', 'desc')->paginate(20);
        return view('livewire.admin.products.reviews',[
            'reviews' => $reviews
        ]);
    }

    public function mount()
    {
       
    }

    public function toggleAction($id){

        $r = Rating::where('id', $id)->first();
        if($r->status == 'approved'){
            $r->status = 'pending';
            $r->save();
        }else{
            $r->status = 'approved';
            $r->save();
        }

        return redirect()->back();
    }


}
