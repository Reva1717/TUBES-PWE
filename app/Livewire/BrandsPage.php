<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Brand;

class BrandsPage extends Component
{
    public function goToBrand($brandId)
    {
        return redirect()->route('products', ['brand' => $brandId]);
    }

    public function render()
    {
        $brands = Brand::all();
        return view('livewire.brands-page', compact('brands'));
    }
} 