<!DOCTYPE html>
<html lang="en" class="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Commerce Product Page</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @livewireStyles
</head>
<body class="bg-gray-100 dark:bg-gray-800">

  <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <!-- Hero Section -->
    <div class="text-center mb-12">
      <h1 class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-4">
        Discover Our <span class="text-blue-600">Premium Collection</span>
      </h1>
      <p class="text-lg text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">
        Elevate your style with our curated selection of high-quality products. Each piece is crafted with precision and designed to make a statement.
      </p>
      <div class="flex w-40 mt-4 mb-6 mx-auto overflow-hidden rounded">
        <div class="flex-1 h-2 bg-blue-200"></div>
        <div class="flex-1 h-2 bg-blue-400"></div>
        <div class="flex-1 h-2 bg-blue-600"></div>
      </div>
    </div>

    <section class="py-10 bg-gray-50 dark:bg-gray-800 rounded-lg">
      <div class="px-4 py-4 mx-auto max-w-7xl lg:py-6 md:px-6">
        <!-- Product Grid -->
        <div class="w-full" id="product-grid">
          <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach ($products as $product)
              <div class="group bg-white dark:bg-gray-900 border border-gray-200 dark:border-gray-700 rounded-xl shadow-sm hover:shadow-xl transition-all duration-300 overflow-hidden">
                <div class="relative bg-white dark:bg-gray-800 p-4">
                  <a href="/products/{{ $product->slug }}" class="block">
                    <div class="relative overflow-hidden rounded-lg">
                      <img 
                        src="{{ asset('storage/' . ($product->images[0] ?? 'default.jpg')) }}" 
                        alt="{{ $product->name }}" 
                        class="object-contain w-full h-64 mx-auto transform group-hover:scale-105 transition-transform duration-300"
                        loading="lazy"
                      >
                      @if($product->on_sale)
                        <div class="absolute top-2 right-2 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-semibold">
                          SALE
                        </div>
                      @endif
                    </div>
                  </a>
                </div>
                <div class="p-4">
                  <div class="flex items-center justify-between gap-2 mb-2">
                    <h3 class="text-xl font-semibold text-gray-800 dark:text-gray-200 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                      {{ $product->name }}
                    </h3>
                  </div>
                  <p class="text-lg font-bold">
                    <span class="text-green-600 dark:text-green-400">RP {{ number_format($product->price, 0, ',', '.') }}</span>
                    @if($product->on_sale)
                      <span class="ml-2 text-sm text-gray-500 line-through">
                        RP {{ number_format($product->price * 1.2, 0, ',', '.') }}
                      </span>
                    @endif
                  </p>
                </div>
                <div class="flex justify-center p-4 border-t border-gray-200 dark:border-gray-700">
                  <button 
                    wire:click="addToCart({{ $product->id }})"
                    wire:loading.attr="disabled"
                    wire:target="addToCart({{ $product->id }})"
                    class="flex items-center gap-2 px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-300 disabled:opacity-50 disabled:cursor-not-allowed"
                  >
                    <svg wire:loading.remove wire:target="addToCart({{ $product->id }})" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="w-5 h-5" viewBox="0 0 16 16">
                      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <svg wire:loading wire:target="addToCart({{ $product->id }})" class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                      <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                      <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span wire:loading.remove wire:target="addToCart({{ $product->id }})">Add to Cart</span>
                    <span wire:loading wire:target="addToCart({{ $product->id }})">Adding...</span>
                  </button>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </section>
  </div>

  @livewireScripts
  <script>
    document.addEventListener('livewire:initialized', () => {
      Livewire.on('cartUpdated', () => {
        // Refresh halaman tanpa scroll ke atas
        window.location.reload();
      });
    });
  </script>
</body>
</html>
