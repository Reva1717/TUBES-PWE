<?php

namespace App\Livewire;

use Livewire\Component;

class CartPage extends Component
{
    public $cartItems = [];
    public $subtotal = 0;
    public $tax = 0;
    public $total = 0;

    public function mount()
    {
        // Ambil data cart dari session
        $this->cartItems = session()->get('cart', []);

        // Pastikan gambar yang digunakan ada dan path-nya benar
        foreach ($this->cartItems as &$item) {
            // Jika gambar tidak ada, tentukan gambar default
            if (!isset($item['image']) || empty($item['image'])) {
                $item['image'] = 'default.jpg'; // Ganti dengan gambar default Anda
            }
        }

        // Hitung subtotal
        $this->subtotal = collect($this->cartItems)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        // Hitung pajak 10% dari subtotal
        $this->tax = $this->subtotal * 0.1;

        // Total harga
        $this->total = $this->subtotal + $this->tax;
    }

    public function removeFromCart($productId)
    {
        // Ambil data cart dari session
        $cart = session()->get('cart', []);

        // Cek jika item ada di cart
        if (isset($cart[$productId])) {
            // Hapus item dari cart berdasarkan productId
            unset($cart[$productId]);

            // Simpan kembali ke session setelah penghapusan
            session()->put('cart', $cart);
        }

        // Update cartItems dan perhitungan setelah penghapusan
        $this->cartItems = $cart;
        $this->recalculateCart();
    }

    // Fungsi untuk menghitung ulang subtotal, pajak, dan total
    public function recalculateCart()
    {
        $this->subtotal = collect($this->cartItems)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $this->tax = $this->subtotal * 0.1;
        $this->total = $this->subtotal + $this->tax;
    }

    public function checkout()
    {
        if (empty($this->cartItems)) {
            session()->flash('error', 'Your shopping cart is empty!');
            return;
        }

        return redirect()->route('checkout');
    }

    public function render()
    {
        return view('livewire.cart-page');
    }
}
