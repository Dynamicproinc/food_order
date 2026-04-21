<?php

namespace App\Livewire\Account;

use Livewire\Component;
use App\Models\User;

use function Pest\Laravel\session;
use function Symfony\Component\String\s;

class Setting extends Component
{

    public $first_name, $last_name;


    public function render()
    {
        return view('livewire.account.setting');
    }

    public function mount(){
        $this->first_name = auth()->user()->name;
        $this->last_name = auth()->user()->last_name;
    }

    public function update(){
        try {
           $this->validate([
            'first_name'=>'required|max:255',
            'last_name'=> 'required|max:255'
        ]);

        $user = User::where('id', auth()->user()->id)->first();
        $user->name = $this->first_name;
        $user->last_name = $this->last_name;
        $user->save();

      return redirect()->back()->with('success', 'Changes have been saved successfully!');
        } catch (\Throwable $th) {
          $this->addError('general', 'Something went wrong');
        }


    }

    public function delete(){
        try {
            auth()->user()->delete();
            return redirect()->route('home');
        } catch (\Throwable $th) {
            $this->addError('general', 'Something went wrong');
        }
    }
}
