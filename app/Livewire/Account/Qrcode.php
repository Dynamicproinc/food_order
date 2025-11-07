<?php

namespace App\Livewire\Account;

use Livewire\Component;
use App\Models\QrCode as Code;
use Illuminate\Support\Str;

class Qrcode extends Component
{

    public $qr;


    public function render()
    {
        return view('livewire.account.qrcode');
    }

    public function mount(){
        $this->qr = Code::where('user_id', auth()->user()->id)->first(); 
    }
    public function generateQR(){
        $qr =  Code::create([
            'user_id' => auth()->user()->id,
            'slug' => auth()->user()->id.Str::random(10)
         ]);   

         $this->qr = $qr;
         $this->dispatch('cartMessage',title: 'New QR Code generated');
          return redirect()->to(route('home'));

    }
}
