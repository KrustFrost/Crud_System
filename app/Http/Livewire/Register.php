<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Foundation\Auth\AuthenticatesUsers;
class Register extends Component
{
    public $name;
    public $email;
    public $password;
    public $phone;
    public function resetinputfields(){
        $this->name = "";
        $this->email = "";
        $this->password = "";
        $this->phone = "";
    }
    public function render()
    {
        return view('livewire.register');
    }

    public function register(){

        $validatedData = $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'phone' => 'required|numeric'
        ]);
        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'password' => Hash::make($this->password),
        ]);
        $this->resetinputFields();
        header_remove('x-powered-by');
        return redirect('/students');
    }
}
