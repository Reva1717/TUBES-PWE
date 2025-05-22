<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use Illuminate\Support\Facades\Log;

class MyOrderDetailPage extends Component
{
    public $order;
    public $orderItems;
    public $total = 0;

    public function mount($orderId)
    {
        try {
            // Ambil data order beserta relasinya
            $this->order = Order::with(['items.product', 'user'])
                ->where('id', $orderId)
                ->where('user_id', auth()->id()) // Pastikan order milik user yang login
                ->firstOrFail();

            // Ambil items order
            $this->orderItems = $this->order->items->map(function($item) {
                return [
                    'name' => $item->product->name,
                    'image' => $item->product->image,
                    'price' => $item->unit_amount,
                    'quantity' => $item->quantity,
                    'total' => $item->total_amount
                ];
            });

            // Hitung total
            $this->total = $this->order->grand_total;

            Log::info('Detail order loaded:', [
                'order_id' => $orderId,
                'items_count' => $this->orderItems->count()
            ]);

        } catch (\Exception $e) {
            Log::error('Error loading order detail: ' . $e->getMessage());
            session()->flash('error', 'Order tidak ditemukan.');
            return redirect()->route('my.orders');
        }
    }

    public function render()
    {
        return view('livewire.my-order-detail-page', [
            'order' => $this->order,
            'items' => $this->orderItems
        ]);
    }
}
