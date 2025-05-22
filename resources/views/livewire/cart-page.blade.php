<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shopping Cart</title>
  <script src="https://cdn.tailwindcss.com"></script>
  @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800">
        
  <!-- Cart Section -->
  <div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="container mx-auto px-4">
      <h1 class="text-3xl font-bold mb-6 text-center">🛒 Shopping Cart</h1>

      @if (session()->has('error'))
          <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
              <span class="block sm:inline">{{ session('error') }}</span>
          </div>
      @endif

      <div class="flex flex-col md:flex-row gap-6">

        <!-- Cart Table -->
        <div class="md:w-3/4">
          <div class="bg-white overflow-x-auto rounded-xl shadow-lg p-6 mb-6">
            <table class="w-full table-auto">
              <thead class="bg-gray-200">
                <tr>
                  <th class="text-left font-semibold px-4 py-3">Product</th>
                  <th class="text-left font-semibold px-4 py-3">Price</th>
                  <th class="text-left font-semibold px-4 py-3">Quantity</th>
                  <th class="text-left font-semibold px-4 py-3">Total</th>
                  <th class="text-left font-semibold px-4 py-3">Action</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($cartItems as $id => $item)
                  <tr class="border-b">
                    <td class="py-4 px-4">
                      <div class="flex items-center">
                        <!-- Product Image -->
                        <img class="h-16 w-16 mr-4 rounded" 
                             src="{{url('storage/'. $item['image']) }}" 
                             alt="Product Image">
                        <span class="font-medium text-lg">{{ $item['name'] }}</span>
                      </div>
                    </td>
                    <td class="py-4 px-4 text-green-600 font-semibold">RP {{ number_format($item['price'], 0, ',', '.') }}</td>
                    <td class="py-4 px-4">
                      <div class="flex items-center">
                        <button class="border rounded-md py-2 px-4 mr-2">-</button>
                        <span class="text-center w-8">{{ $item['quantity'] }}</span>
                        <button class="border rounded-md py-2 px-4 ml-2">+</button>
                      </div>
                    </td>
                    <td class="py-4 px-4 font-semibold">RP {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}</td>
                    <td class="py-4 px-4">
                      <button wire:click="removeFromCart({{ $id }})" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg">Remove</button>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td colspan="5" class="text-center py-4">Your cart is empty</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <!-- Order Summary -->
        <div class="md:w-1/4">
          <div class="bg-white rounded-xl shadow-lg p-6">
            <h2 class="text-xl font-bold mb-4">Order Summary</h2>
            <div class="flex justify-between mb-2">
              <span>Subtotal</span>
              <span>RP {{ number_format($subtotal, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between mb-2">
              <span>Tax (10%)</span>
              <span>RP {{ number_format($tax, 0, ',', '.') }}</span>
            </div>
            <div class="flex justify-between mb-2">
              <span>Shipping</span>
              <span>RP 0</span>
            </div>
            <hr class="my-3 border-gray-300">
            <div class="flex justify-between mb-4 text-lg font-semibold">
              <span>Total</span>
              <span>RP {{ number_format($total, 0, ',', '.') }}</span>
            </div>
            <button wire:click="checkout" class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-semibold transition duration-200">
              Checkout
            </button>
          </div>
        </div>

      </div>
    </div>
  </div>

  @livewireScripts
</body>
</html>
