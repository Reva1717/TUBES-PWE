<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;
 
    protected $fillable = [
        'user_id', // ID Pengguna yang memesan
        'grand_total', // Total harga untuk pesanan
        'payment_method', // Metode pembayaran (misalnya 'COD', 'Stripe')
        'payment_status', // Status pembayaran (misalnya 'pending', 'paid')
        'status', // Status pesanan (misalnya 'new', 'processing', 'shipped')
        'currency', // Mata uang untuk pembayaran
        'shipping_amount', // Biaya pengiriman
        'shipping_method', // Metode pengiriman (misalnya 'FedEx')
        'notes', // Catatan tambahan untuk pesanan
    ];

    
    public function user() {
        return $this->belongsTo(User::class);
    }
 
    public function items() {
        return $this->hasMany(OrderItem::class);
    }
 
    public function address() {
        return $this->hasOne(Address::class);
    }
 }