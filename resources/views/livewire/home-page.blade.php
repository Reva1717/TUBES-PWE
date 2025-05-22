<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RENUSA - Branded Bags</title>

  <!-- Tailwind CDN (v3.x) -->
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#EF88AD] text-gray-800">


  <!-- Hero Section -->
  <div class="w-full h-screen py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-[85rem] mx-auto grid md:grid-cols-2 gap-8 xl:gap-20 items-center">
      
      <!-- Left content -->
      <div>
        <h1 class="text-3xl sm:text-4xl lg:text-6xl font-bold leading-tight">
          Start your journey with <span class="text-blue-600">RENUSA</span>
        </h1>
        <p class="mt-4 text-lg">
          Discover a curated collection of exquisite branded bags. Elevate your style with our selection of designer handbags, clutches, totes, and more, crafted from premium materials and showcasing iconic designs.
        </p>

        <!-- Buttons -->
        <div class="mt-6 flex flex-col sm:flex-row gap-3">
          <a href="/register" class="inline-flex items-center justify-center px-5 py-3 text-sm font-semibold text-white bg-blue-600 rounded-lg hover:bg-blue-700">
            Get started
            <svg class="ml-2 w-4 h-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path d="M9 5l7 7-7 7" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
          </a>
          <a href="/contact" class="inline-flex items-center justify-center px-5 py-3 text-sm font-medium text-gray-800 bg-white border border-gray-200 rounded-lg shadow-sm hover:bg-gray-50">
            Contact sales team
          </a>
        </div>

        <!-- Review -->
        <div class="mt-8">
          <div class="flex space-x-1">
            <!-- 5 stars -->
            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 .587l3.668 7.431 8.2 1.191-5.934 5.787 1.402 8.168L12 18.896l-7.336 3.868 1.402-8.168L.132 9.209l8.2-1.191z"/>
            </svg>
            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 .587l3.668 7.431 8.2 1.191-5.934 5.787 1.402 8.168L12 18.896l-7.336 3.868 1.402-8.168L.132 9.209l8.2-1.191z"/>
            </svg>
            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 .587l3.668 7.431 8.2 1.191-5.934 5.787 1.402 8.168L12 18.896l-7.336 3.868 1.402-8.168L.132 9.209l8.2-1.191z"/>
            </svg>
            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 .587l3.668 7.431 8.2 1.191-5.934 5.787 1.402 8.168L12 18.896l-7.336 3.868 1.402-8.168L.132 9.209l8.2-1.191z"/>
            </svg>
            <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 .587l3.668 7.431 8.2 1.191-5.934 5.787 1.402 8.168L12 18.896l-7.336 3.868 1.402-8.168L.132 9.209l8.2-1.191z"/>
            </svg>
          </div>
          <p class="mt-2 text-sm">
            <span class="font-bold">4.6</span> /5 — from 12k reviews
          </p>
        </div>
      </div>

      <!-- Right image -->
      <div class="hidden md:block">
        <img src="{{ asset('images/homepage.jpg') }}" alt="RENUSA bag collection" class="w-full max-w-md mx-auto">

      </div>

    </div>
  </div>

</body>
</html>

{{--HERO SECTION START --}}


{{--HERO SECTION END --}}


{{--BRAND SECTION START --}}
<section class="py-20 bg-white">
    <div class="max-w-6xl px-4 mx-auto">
        <div class="text-center mb-12">
            <h2 class="text-5xl font-bold text-gray-900">Browse Popular <span class="text-blue-500">Brands</span></h2>
            <div class="flex w-40 mt-4 mb-6 mx-auto overflow-hidden rounded">
                <div class="flex-1 h-2 bg-blue-200"></div>
                <div class="flex-1 h-2 bg-blue-400"></div>
                <div class="flex-1 h-2 bg-blue-600"></div>
            </div>
            <p class="text-base text-gray-600">
                Explore the finest luxury bag brands. Choose from our handpicked premium collections.
            </p>
        </div>

        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
            @forelse($brands as $brand)
                <a href="{{ route('products', ['brand' => $brand->id]) }}" class="bg-white rounded-lg shadow hover:shadow-lg transition block">
                    @if($brand->image)
                        <img src="{{ asset('storage/' . $brand->image) }}" 
                             alt="{{ $brand->name }}" 
                             class="w-full h-48 object-contain p-4">
                    @endif
                    <div class="p-4 text-center">
                        <h3 class="text-xl font-bold text-gray-800">{{ $brand->name }}</h3>
                    </div>
                </a>
            @empty
                <div class="col-span-full text-center text-gray-500">
                    No active brands available.
                </div>
            @endforelse
        </div>
    </div>
</section>
{{--BRAND SECTION END --}}


{{--BRAND SECTION START --}}

<div class="bg-orange-200 py-20">
    <div class="max-w-xl mx-auto">
      <div class="text-center">
        <div class="relative flex flex-col items-center">
          <h1 class="text-5xl font-bold dark:text-gray-200">Browse <span class="text-blue-500">Categories</span></h1>
          <div class="flex w-40 mt-2 mb-6 overflow-hidden rounded">
            <div class="flex-1 h-2 bg-blue-200"></div>
            <div class="flex-1 h-2 bg-blue-400"></div>
            <div class="flex-1 h-2 bg-blue-600"></div>
          </div>
        </div>
        <p class="mb-12 text-base text-center text-gray-500">
          Explore our elegant and stylish bag categories to suit your needs.
        </p>
      </div>
    </div>
    {{--BRAND SECTION END --}}
  

  
 {{-- CATEGORY SECTION START --}}
<div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto py-8">
    <h2 class="text-xl font-bold text-gray-800 mb-6">Product Categories</h2>

    <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
        @forelse($categories as $category)
            <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md transition" 
               href="{{ route('products', ['category' => $category->slug]) }}">
                <div class="p-4 md:p-5">
                    <div class="flex justify-between items-center">
                        <div class="flex items-center">
                            <img class="h-12 w-12 rounded-full object-cover" 
                                 src="{{ asset('storage/' . $category->image) }}" 
                                 alt="{{ $category->name }}">
                            <div class="ms-3">
                                <h3 class="group-hover:text-blue-600 font-semibold text-gray-800">
                                    {{ $category->name }}
                                </h3>
                            </div>
                        </div>
                        <div class="ps-3">
                            <svg class="w-5 h-5 text-gray-400 group-hover:text-blue-600" fill="none" 
                                 stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path d="m9 18 6-6-6-6" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </a>
        @empty
            <div class="col-span-full text-center text-gray-500">
                No active categories yet.
            </div>
        @endforelse
    </div>
</div>
{{-- CATEGORY SECTION END --}}


  


{{--CUSTOMER SECTION START --}}

  <!-- Brand Section -->
  <div class="p-4 mb-5 bg-white border border-gray-200 dark:bg-gray-900 dark:border-gray-900">
    <h2 class="text-2xl font-bold dark:text-gray-400">Brand</h2>
    <div class="w-16 pb-2 mb-6 border-b border-rose-600 dark:border-gray-400"></div>
    <ul>
        @foreach($brands as $brand)
            <li class="mb-4">
                <label class="flex items-center dark:text-gray-300">
                    <img src="{{ asset('storage/' . $brand->image) }}" 
                         alt="{{ $brand->name }}" 
                         class="w-8 h-8 mr-3 object-contain">
                    <span class="text-lg dark:text-gray-400">{{ $brand->name }}</span>
                </label>
            </li>
        @endforeach
    </ul>
  </div>

<form wire:submit.prevent>
  <select wire:model="selectedCategory" class="border rounded px-3 py-2">
    <option value="">All Categories</option>
    @foreach($categories as $category)
      <option value="{{ $category->id }}">{{ $category->name }}</option>
    @endforeach
  </select>
</form>

@foreach($products as $product)
  <!-- tampilkan produk -->
@endforeach