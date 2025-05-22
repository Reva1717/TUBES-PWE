<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;

class MyOrdersPage extends Component
{
    public $orders;

    public function mount()
    {
        // Mengambil pesanan pengguna berdasarkan ID dan relasi dengan item dan produk
        $this->orders = Order::with(['items.product'])
                            ->where('user_id', auth()->id())
                            ->latest()
                            ->get();
    }

    public function render()
    {
        return view('livewire.my-orders-page')
            ->layout('layouts.app');
    }
}
