<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class RegisterPage extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    // Validasi input form register
    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ];

    // Fungsi register
    public function register()
    {
        $this->validate();  // Validasi input

        // Buat user baru dengan email_verified_at
        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'email_verified_at' => now(), // Menambahkan email_verified_at
        ]);

        session()->flash('message', 'Registration successful! Please log in.');
        return redirect()->route('login');  // Redirect to login page
    }

    // Render halaman register
    public function render()
    {
        return view('livewire.auth.register-page')
            ->layout('layouts.app');
    }
}

