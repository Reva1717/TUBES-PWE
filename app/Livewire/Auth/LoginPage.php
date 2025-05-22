<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginPage extends Component
{
    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:8',
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            return redirect('/'); // Redirect ke halaman utama (root path)
        } else {
            session()->flash('error', 'Incorrect email or password!');
        }
    }

    public function render()
    {
        return view('livewire.auth.login-page')
            ->layout('layouts.app');
    }
}
