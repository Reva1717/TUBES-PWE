<!-- Checkout Page Content -->
<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
  <div>
    <h1 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">
      Checkout
    </h1>

    @if (session()->has('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
      <!-- Main checkout section -->
      <div class="lg:col-span-8 col-span-1 bg-white rounded-xl shadow p-6 sm:p-8 dark:bg-slate-900">
        <!-- Shipping Address -->
        <div class="mb-8">
          <h2 class="text-xl font-bold text-gray-700 dark:text-white mb-4 underline">Shipping Address</h2>
          <div class="space-y-4">
            <div>
              <label for="first_name" class="block text-gray-700 dark:text-white">First Name</label>
              <input type="text" id="first_name" wire:model="first_name" class="w-full rounded-lg border py-3 px-4 dark:bg-gray-700 dark:text-white" placeholder="First Name">
            </div>
            <div>
              <label for="last_name" class="block text-gray-700 dark:text-white">Last Name</label>
              <input type="text" id="last_name" wire:model="last_name" class="w-full rounded-lg border py-3 px-4 dark:bg-gray-700 dark:text-white" placeholder="Last Name">
            </div>
            <div>
              <label for="phone" class="block text-gray-700 dark:text-white">Phone</label>
              <input type="text" id="phone" wire:model="phone" class="w-full rounded-lg border py-3 px-4 dark:bg-gray-700 dark:text-white" placeholder="Phone">
            </div>
            <div>
              <label for="address" class="block text-gray-700 dark:text-white">Address</label>
              <input type="text" id="address" wire:model="address" class="w-full rounded-lg border py-3 px-4 dark:bg-gray-700 dark:text-white" placeholder="Street Address">
            </div>
            <div>
              <label for="city" class="block text-gray-700 dark:text-white">City</label>
              <input type="text" id="city" wire:model="city" class="w-full rounded-lg border py-3 px-4 dark:bg-gray-700 dark:text-white" placeholder="City">
            </div>
            <div class="flex space-x-4">
              <div class="flex-1">
                <label for="state" class="block text-gray-700 dark:text-white">State</label>
                <input type="text" id="state" wire:model="state" class="w-full rounded-lg border py-3 px-4 dark:bg-gray-700 dark:text-white" placeholder="State">
              </div>
              <div class="flex-1">
                <label for="zip" class="block text-gray-700 dark:text-white">ZIP Code</label>
                <input type="text" id="zip" wire:model="zip" class="w-full rounded-lg border py-3 px-4 dark:bg-gray-700 dark:text-white" placeholder="ZIP Code">
              </div>
            </div>
          </div>
        </div>

        <div class="text-lg font-semibold mb-6">
          Select Payment Method
        </div>
        <ul class="grid w-full gap-6 md:grid-cols-2">
          <li>
            <input class="hidden peer" id="cod" name="payment_method" type="radio" value="cod" checked wire:model="payment_method" />
            <label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" for="cod">
              <div class="block">
                <div class="w-full text-lg font-semibold">Cash on Delivery</div>
              </div>
            </label>
          </li>
          <li>
            <input class="hidden peer" id="stripe" name="payment_method" type="radio" value="stripe" wire:model="payment_method" />
            <label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" for="stripe">
              <div class="block">
                <div class="w-full text-lg font-semibold">Stripe</div>
              </div>
            </label>
          </li>
          <li>
            <input class="hidden peer" id="credit_card" name="payment_method" type="radio" value="credit_card" wire:model="payment_method" />
            <label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" for="credit_card">
              <div class="block">
                <div class="w-full text-lg font-semibold">Credit Card</div>
              </div>
            </label>
          </li>
          <li>
            <input class="hidden peer" id="virtual_account" name="payment_method" type="radio" value="virtual_account" wire:model="payment_method" />
            <label class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700" for="virtual_account">
              <div class="block">
                <div class="w-full text-lg font-semibold">Virtual Account</div>
              </div>
            </label>
          </li>
        </ul>
      </div>
      <!-- End Main Checkout Section -->

      <!-- Basket Summary Section -->
      <div class="lg:col-span-4 col-span-1 bg-white rounded-xl shadow p-6 sm:p-8 dark:bg-slate-900">
        <div class="text-xl font-bold text-gray-700 dark:text-white mb-4">
          ORDER SUMMARY
        </div>
        
        <!-- Loop through cart items and display them -->
        @foreach ($cartItems as $item)
          <div class="flex justify-between mb-4 font-bold">
            <span>{{ $item['name'] }}</span>
            <span>Rp {{ number_format($item['price'], 0, ',', '.') }}</span>
          </div>
          <div class="flex justify-between mb-4">
            <span>Quantity</span>
            <span>{{ $item['quantity'] }}</span>
          </div>
        @endforeach

        <hr class="bg-slate-400 my-4 h-1 rounded">

        <div class="flex justify-between mb-4 font-bold">
          <span>Subtotal</span>
          <span>RP {{ number_format($subtotal, 0, ',', '.') }}</span>
        </div>
        <div class="flex justify-between mb-4 font-bold">
          <span>Tax (10%)</span>
          <span>RP {{ number_format($tax, 0, ',', '.') }}</span>
        </div>
        <div class="flex justify-between mb-4 font-bold">
          <span>Shipping (DHL)</span>
          <span>RP 0</span>
        </div>

        <div class="flex justify-between mb-4 text-lg font-semibold">
          <span>Total</span>
          <span>RP {{ number_format($total, 0, ',', '.') }}</span>
        </div>

        <button 
          onclick="handlePlaceOrder()"
          id="placeOrderBtn"
          type="button" 
          class="w-full py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-[#EF88AD] text-white hover:bg-pink-600 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
          Place Order
        </button>
      </div>
      <!-- End Basket Summary Section -->
    </div>
  </div>
</div>

<script>
  function handlePlaceOrder() {
    // Disable button
    const btn = document.getElementById('placeOrderBtn');
    btn.disabled = true;
    btn.innerHTML = 'Processing...';

    // Call Livewire method
    Livewire.dispatch('placeOrder');
  }

  // Listen for success event
  document.addEventListener('livewire:initialized', () => {
    Livewire.on('orderSuccess', () => {
      // Force redirect ke halaman my-orders
      window.location.href = '/my-orders';
    });
  });
</script>
