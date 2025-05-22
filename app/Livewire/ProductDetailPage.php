<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class ProductDetailPage extends Component
{
    public Product $product;
    public $quantity = 1; // Jumlah default

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function addToCart()
    {
        $product = $this->product;

        $cart = session()->get('cart', []);

        $cart[$product->id] = [
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => $this->quantity,
        ];

        session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function render()
    {
        return view('livewire.product-detail-page');
    }
}
