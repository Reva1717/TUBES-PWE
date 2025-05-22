<?php

namespace App\Livewire;
use App\Models\Category;
use Livewire\Component;

class CategoriesPage extends Component
{
    public function render()
    {
        $categories = Category::where('is_active', true)->get();

        return view('livewire.categories-page', compact('categories'))
            ->layout('components.layouts.app', [
                'title' => 'Categories',
            ]);
    }
}