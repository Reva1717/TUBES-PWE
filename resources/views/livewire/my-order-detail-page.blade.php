<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Order - RENUSA</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @livewireStyles
</head>
<body class="bg-[#EF88AD] text-gray-800">
    <div class="min-h-screen py-10 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white rounded-xl shadow-lg p-6">
                <!-- Header -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Detail Order #{{ $order->id }}</h1>
                    <p class="text-gray-600">Tanggal Order: {{ $order->created_at->format('d M Y H:i') }}</p>
                </div>

                <!-- Status Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <!-- Order Status -->
                    <div class="bg-white border rounded-lg p-4">
                        <h3 class="text-sm font-medium text-gray-500">Order Status</h3>
                        <p class="mt-2 text-xl font-semibold text-gray-900">
                            <span class="px-2 py-1 rounded text-white
                                {{ $order->status === 'new' ? 'bg-blue-500' : '' }}
                                {{ $order->status === 'processing' ? 'bg-yellow-500' : '' }}
                                {{ $order->status === 'shipped' ? 'bg-purple-500' : '' }}
                                {{ $order->status === 'delivered' ? 'bg-green-500' : '' }}
                                {{ $order->status === 'cancelled' ? 'bg-red-500' : '' }}">
                                {{ ucfirst($order->status) }}
                            </span>
                        </p>
                    </div>

                    <!-- Payment Status -->
                    <div class="bg-white border rounded-lg p-4">
                        <h3 class="text-sm font-medium text-gray-500">Payment Status</h3>
                        <p class="mt-2 text-xl font-semibold text-gray-900">
                            <span class="px-2 py-1 rounded text-white
                                {{ $order->payment_status === 'pending' ? 'bg-yellow-500' : '' }}
                                {{ $order->payment_status === 'paid' ? 'bg-green-500' : '' }}
                                {{ $order->payment_status === 'failed' ? 'bg-red-500' : '' }}">
                                {{ ucfirst($order->payment_status) }}
                            </span>
                        </p>
                    </div>

                    <!-- Payment Method -->
                    <div class="bg-white border rounded-lg p-4">
                        <h3 class="text-sm font-medium text-gray-500">Payment Method</h3>
                        <p class="mt-2 text-xl font-semibold text-gray-900">{{ strtoupper($order->payment_method) }}</p>
                    </div>

                    <!-- Total -->
                    <div class="bg-white border rounded-lg p-4">
                        <h3 class="text-sm font-medium text-gray-500">Total Payment</h3>
                        <p class="mt-2 text-xl font-semibold text-gray-900">Rp {{ number_format($total, 0, ',', '.') }}</p>
                    </div>
                </div>

                <!-- Order Items -->
                <div class="mt-8">
                    <h2 class="text-lg font-semibold mb-4">Purchased Items</h2>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Product</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Price</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Quantity</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Total</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($items as $item)
                                    <tr>
                                        <td class="px-6 py-4">
                                            <div class="flex items-center">
                                                <img class="h-16 w-16 rounded object-cover mr-4" 
                                                     src="{{url('storage/' . $item['image']) }}" 
                                                     alt="{{ $item['name'] }}">
                                                <div>
                                                    <div class="text-sm font-medium text-gray-900">{{ $item['name'] }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            RP {{ number_format($item['price'], 0, ',', '.') }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $item['quantity'] }}
                                        </td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            RP {{ number_format($item['total'], 0, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Back Button -->
                <div class="mt-8">
                    <a href="{{ route('my.orders') }}" 
                       class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-[#EF88AD] hover:bg-pink-600">
                        ← Back to Order List
                    </a>
                </div>
            </div>
        </div>
    </div>
    @livewireScripts
</body>
</html>