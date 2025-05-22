@php
    $cart = session()->get('cart', []);
    $totalQuantity = array_sum(array_column($cart, 'quantity'));
@endphp
<span class="py-0.5 px-1.5 rounded-full text-xs font-medium bg-blue-50 border border-blue-200 text-blue-600">
    {{ $totalQuantity }}
</span>