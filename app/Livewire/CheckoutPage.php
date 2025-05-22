<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;

class CheckoutPage extends Component
{
    public $cartItems = [];
    public $subtotal = 0;
    public $tax = 0;
    public $total = 0;
    public $first_name, $last_name, $phone, $address, $city, $state, $zip;
    public $payment_method = 'cod';

    #[On('placeOrder')]
    public function placeOrder()
    {
        try {
            // Validasi auth
            if (!auth()->check()) {
                session()->flash('error', 'Please log in first.');
                $this->redirect('/login');
                return;
            }

            // Validasi cart
            if (empty($this->cartItems)) {
                session()->flash('error', 'Your shopping cart is empty!');
                return;
            }

            Log::info('Cart contents before checkout:', $this->cartItems);

            // Buat order
            $order = Order::create([
                'user_id' => auth()->id(),
                'grand_total' => $this->total,
                'payment_method' => $this->payment_method,
                'payment_status' => 'pending',
                'status' => 'new',
                'currency' => 'RP',
                'shipping_method' => 'dhl',
                'shipping_amount' => 0,
                'notes' => 'Order from checkout',
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'phone' => $this->phone,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'zip' => $this->zip,
            ]);

            Log::info('Order created successfully with ID: ' . $order->id);

            // Simpan items
            foreach ($this->cartItems as $item) {
                if (!isset($item['id'])) {
                    continue;
                }
                $product = \App\Models\Product::find($item['id']);
                if ($product) {
                    $product->stok -= $item['quantity'];
                    if ($product->stok < 0) {
                        $product->stok = 0;
                    }
                    $product->save();
                }
                \Log::info('Cart item before save:', $item);
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['id'],
                    'quantity' => $item['quantity'],
                    'unit_amount' => $item['price'],
                    'total_amount' => $item['price'] * $item['quantity'],
                ]);
            }

            // Bersihkan cart
            session()->forget('cart');
            Log::info('Cart cleared successfully');
            
            // Set success message
            session()->flash('message', 'Order placed successfully!');

            // Trigger event untuk JavaScript redirect
            $this->dispatch('orderSuccess');

        } catch (\Exception $e) {
            Log::error('Error in placeOrder: ' . $e->getMessage());
            session()->flash('error', 'An error occurred while placing the order. Please try again.');
        }
    }

    public function mount()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->cartItems = session()->get('cart', []);
        $this->recalculateCart();
    }

    public function recalculateCart()
    {
        $this->subtotal = collect($this->cartItems)->sum(function ($item) {
            return $item['price'] * $item['quantity'];
        });

        $this->tax = $this->subtotal * 0.1;
        $this->total = $this->subtotal + $this->tax;
    }

    public function render()
    {
        return view('livewire.checkout-page')
            ->layout('layouts.app');
    }

    public function remove($productId)
    {
        $cart = session()->get('cart', []);
        unset($cart[$productId]);
        session()->put('cart', $cart);

        $this->cartItems = array_values($cart); // reset index
        $this->recalculateCart();
    }
}
