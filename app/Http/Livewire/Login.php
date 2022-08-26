<?php

namespace App\Http\Livewire;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;
class Login extends Component
{

    public $email;
    public $password;

    public function resetinputfields(){

        $this->email = "";
        $this->password = "";
    }
    public function render()
    {
        return view('livewire.login');
    }
    public function login()
    {   
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        if(Auth::attempt(['email' => $this->email, 'password' => $this->password, 'is_admin' =>  1])){
            return redirect('admin');
        }else{
            return back()->with('invalid_login','Invalid Login');
        }        
    }
}