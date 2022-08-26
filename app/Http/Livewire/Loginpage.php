<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;
class Loginpage extends Component
{
    public $email;
    public $password;
    public function render()
    {
        return view('livewire.loginpage');
    }
    public function resetinputfields(){
        $this->email = "";
        $this->password = "";
    }
    public function login()
    {       
        dd('hello');
        $validatedData = $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email' => $this->email, 'password' => $this->password])){
            return redirect('students');
        }else{
            return back()->with('invalid_login','Invalid Login');
        }        
    }
}
