<?php

namespace App\Livewire\Admin\Setting;

use Livewire\Component;
use App\Models\ShopStatus as SS;

class Shopstatus extends Component
{

    public $statuses = [];
    public $status;
    public $closing_date;

    public function render()
    {
        return view('livewire.admin.setting.shopstatus');
    }
    public function  mount(){
        $this->statuses = SS::all();
    }

    public function delete($id){
        SS::where('id', $id)->delete();
        session()->flash('message', 'Status Deleted Successfully.');
        $this->statuses = SS::all();
    }

    public function saveStatus(){
        $newstatus = new SS();
        $newstatus->status_name = 'closed';
        $newstatus->status_color = $this->status;
        $newstatus->closing_date = $this->closing_date;
        $newstatus->save();
        session()->flash('message', 'Status  Added Successfully.');
        $this->resetInputFields();
        $this->statuses = SS::all();
    }

    private function resetInputFields(){
        $this->status = '';
        $this->closing_date = '';
    }


}