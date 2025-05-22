<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RENUSA - Branded Bags</title>

  <!-- Tailwind CDN (v3.x) -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>
</head>
<body class="bg-[#EF88AD] text-gray-800">

  <!-- Main Wrapper - Single Root Element -->
  <div class="w-full">

    <!-- Hero Section -->
    <div class="h-screen py-10 px-4 sm:px-6 lg:px-8">
      <div class="max-w-[85rem] mx-auto flex justify-center items-center">
        <div class="w-full bg-gray-100 pb-20">
          <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
            <div class="text-center mb-10">
              <h1 class="text-4xl font-bold text-gray-900 mb-4 font-poppins">Our Categories</h1>
              <div class="w-24 h-1 bg-[#EF88AD] mx-auto"></div>
            </div>

            <!-- Category Listing -->
            <div class="flex flex-wrap justify-center gap-8 mb-20">
              @foreach ($categories as $category)
                <a href="{{ route('products', ['category' => $category->slug]) }}"
                   class="group bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden flex flex-col md:flex-row items-center justify-center max-w-xs">
                  
                  {{-- Gambar --}}
                  <div class="w-[300px] h-[200px] flex items-center justify-center p-6 bg-white">
                    <img src="{{ asset('storage/' . $category->image) }}"
                         alt="{{ $category->name }}"
                         class="max-w-full max-h-full object-contain">
                  </div>

                  {{-- Teks --}}
                  <div class="flex-1 p-6 flex flex-col justify-center border-l mt-4 md:mt-0">
                    <h3 class="text-2xl font-bold text-gray-800 mb-2 font-poppins">
                      {{ strtoupper($category->name) }}
                    </h3>
                    <p class="text-gray-500 mb-4 font-poppins">Explore Collection</p>
                    <div class="flex items-center text-[#EF88AD]">
                      <span class="text-sm group-hover:translate-x-2 transition-transform duration-300 flex items-center font-poppins">
                        View More
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                      </span>
                    </div>
                  </div>

                </a>
              @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Section -->
    <footer class="bg-dark-gray text-white py-10 mt-20">
      <div class="max-w-[85rem] mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="mb-6">
          <p>&copy; 2025 RENUSA. All rights reserved.</p>
        </div>
      </div>
    </footer>

  </div>

</body>
</html>
