<?php

namespace App\Livewire;

use App\Models\Brand;
use Livewire\Component;
use App\Models\Category;
use App\Models\Product;

class HomePage extends Component
{
    public $brands;
    public $selectedCategory = '';

    public function mount()
    {
        // Ambil brand yang aktif
        $this->brands = Brand::where('is_active', true)
            ->latest()
            ->get();
    }

    public function render()
    {
        $categories = Category::where('is_active', true)->get();
        $brands = $this->brands;
        $products = Product::query();
        if ($this->selectedCategory) {
            $products->where('category_id', $this->selectedCategory);
        }
        $products = $products->get();
        return view('livewire.home-page', compact('categories', 'brands', 'products'))
            ->layout('components.layouts.app', [
                'title' => 'Home',
            ]);
    }
}
