<?php

namespace App\Livewire\Admin\Point;

use Livewire\Component;
use App\Models\QrCode;
use App\Models\User;
use App\Models\PointTransaction;
use App\Models\UserPointTotal;
use Illuminate\Support\Facades\Session;

class PointManager extends Component
{
    public $qr;
    public $user_id;
    public $user;
    public $er_message;
    public $amount = 0;
    public $balance;
    
    

    public function render()
    {
        return view('livewire.admin.point.point-manager');
    }


   
    public function search(){
        $this->validate([
            'qr' => 'required',
        ]);

        
        // find out the user id
        $qr_code = QrCode::where('slug', $this->qr)->first();
       if ($qr_code) {
            $this->user_id = $qr_code->user_id;
            $this->user = User::find($this->user_id);
            $this->er_message = null;

             $this->balance = UserPointTotal::where('user_id', $this->user_id)->first()?->balance;
        } else {
            $this->er_message = "Invalid QR"; 
            $this->user = null;
        }
        

        

        


    }

    public function debit(){
             $this->validate([
           'amount' => 'required|numeric|gt:1',
        ]);

        if($this->amount > $this->balance || !$this->balance){
            return null;
        }

        PointTransaction::debit($this->user->id, $this->amount, 'Coupone deduction');
        UserPointTotal::updateBalance($this->user->id, -$this->amount);

        $this->user = User::find($this->user_id);
        $this->amount = 0;
        // update balance
        $this->balance = UserPointTotal::where('user_id', $this->user_id)->first()?->balance;
        

    }
    public function credit(){
             $this->validate([
            'amount' => 'required|numeric|gt:1',
        ]);

        
        PointTransaction::credit($this->user->id, $this->amount, 'Coupon added');
        UserPointTotal::updateBalance($this->user->id, $this->amount);
        $this->user = User::find($this->user_id);
        $this->amount = 0;
        // update balance
        $this->balance = UserPointTotal::where('user_id', $this->user_id)->first()?->balance;

    }

    
}
