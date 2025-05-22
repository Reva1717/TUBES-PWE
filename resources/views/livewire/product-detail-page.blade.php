<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RENUSA - Branded Bags</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

  <div class="max-w-7xl mx-auto px-6 lg:px-16 py-20 font-sans">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

      <!-- LEFT: Gambar Produk -->
      <div x-data="{ mainImage: '{{ asset('storage/' . ($product->images[0] ?? 'placeholder.jpg')) }}' }">
        <!-- Gambar Utama: Ukuran lebih besar -->
        <div class="w-full aspect-[3/4] bg-white shadow-lg rounded-xl overflow-hidden">
          <img :src="mainImage" alt="Main Image" class="w-full h-full object-cover object-center transition-all duration-300">
        </div>

        <!-- Thumbnail -->
        @if ($product->images && is_array($product->images))
          <div class="flex gap-4 mt-6">
            @foreach ($product->images as $img)
              <img 
                src="{{ asset('storage/' . $img) }}"
                alt="Thumbnail"
                class="w-20 h-20 rounded-md border object-cover cursor-pointer hover:ring-2 hover:ring-blue-500 transition-all"
                x-on:click="mainImage = '{{ asset('storage/' . $img) }}'"
              >
            @endforeach
          </div>
        @endif
      </div>

      <!-- RIGHT: Informasi Produk -->
      <div class="pl-4 lg:pl-16">
        <!-- Nama Produk -->
        <h1 class="text-5xl font-semibold text-gray-900 mb-6">{{ $product->name }}</h1>

        <!-- Harga -->
        <div class="mb-6">
          <span class="text-4xl font-bold text-gray-900">
            RP {{ number_format($product->price, 0, ',', '.') }}
          </span>
          @if ($product->on_sale)
            <span class="ml-4 text-xl text-gray-500 line-through">
              RP {{ number_format($product->price * 1.2, 0, ',', '.') }}
            </span>
          @endif
        </div>

        <!-- Stok -->
        <div class="mb-6">
          <span class="text-lg font-medium text-gray-700">
            Stok: {{ $product->stok }}
          </span>
        </div>

        <!-- Deskripsi -->
        <div class="mb-10 text-gray-700 text-lg leading-relaxed">
          {!! nl2br(e($product->description)) !!}
        </div>

        <!-- Form Jumlah dan Tombol -->
        <div class="flex items-center gap-4 mb-6">
          <label for="quantity" class="text-base font-medium text-gray-700">Quantity</label>
          <input type="number" id="quantity" name="quantity" min="1" value="1" class="w-20 text-center border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="flex flex-col sm:flex-row sm:items-center gap-4">
        <button wire:click="addToCart"
                class="w-full sm:w-auto px-8 py-3 bg-blue-600 hover:bg-blue-700 text-white text-base font-semibold rounded-lg transition-all">
            Add to Cart
        </button>
          <span class="text-sm text-gray-500">Free shipping across Indonesia</span>
        </div>
      </div>

    </div>
  </div>
</body>
</html>
