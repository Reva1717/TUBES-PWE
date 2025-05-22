<?php

namespace App\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;

class ProductsPage extends Component
{
    public function render()
    {
        $products = Product::query()->get();
        return view('livewire.products-page', compact('products'));
    }

    public function addToCart($productId)
    {
        $product = Product::findOrFail($productId);

        $cart = session()->get('cart', []);

        // Ambil gambar pertama dari array 'images', fallback ke 'default.jpg' jika kosong
        $imagePath = $product->images[0] ?? 'default.jpg';

        if (isset($cart[$productId])) {
            $cart[$productId]['quantity'] += 1;
        } else {
            $cart[$productId] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $imagePath,
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        $this->dispatch('cartUpdated');
    }
}
