<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>RENUSA - Branded Bags</title>
  
  <!-- Tailwind CSS CDN -->
  <script src="https://cdn.tailwindcss.com"></script>
  @livewireStyles
</head>
<body class="bg-[#EF88AD] text-gray-800">

  <!-- Hero Section -->
  <div class="min-h-screen flex items-center justify-center py-10 px-4 sm:px-6 lg:px-8">
    <div class="w-full max-w-7xl bg-white p-10 rounded-lg shadow-lg mx-auto">
      
      <h1 class="text-4xl font-bold text-slate-500 text-center mb-8">My Orders</h1>

      @if(session()->has('message'))
          <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
              {{ session('message') }}
          </div>
      @endif

      <!-- Orders Table -->
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-50">
            <tr>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Order ID</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Payment</th>
              <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total</th>
              <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($orders as $order)
              <tr>
                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                  #{{ $order->id }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  {{ $order->created_at->format('d M Y H:i') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                    {{ $order->status === 'new' ? 'bg-blue-100 text-blue-800' : '' }}
                    {{ $order->status === 'processing' ? 'bg-yellow-100 text-yellow-800' : '' }}
                    {{ $order->status === 'shipped' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $order->status === 'delivered' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $order->status === 'cancelled' ? 'bg-red-100 text-red-800' : '' }}">
                    {{ ucfirst($order->status) }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm">
                  <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                    {{ $order->payment_status === 'pending' ? 'bg-yellow-100 text-yellow-800' : '' }}
                    {{ $order->payment_status === 'paid' ? 'bg-green-100 text-green-800' : '' }}
                    {{ $order->payment_status === 'failed' ? 'bg-red-100 text-red-800' : '' }}">
                    {{ ucfirst($order->payment_status) }}
                  </span>
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                  RP {{ number_format($order->grand_total, 0, ',', '.') }}
                </td>
                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                  <a href="{{ route('order.detail', ['orderId' => $order->id]) }}" 
                     class="text-white bg-[#EF88AD] hover:bg-pink-600 px-4 py-2 rounded-lg">
                    View Details
                  </a>
                </td>
              </tr>
            @empty
              <tr>
                <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">
                  No orders found
                </td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </div>

  @livewireScripts
</body>
</html>
