<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    use HasFactory;
 
    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'images',
        'description',
        'price',
        'stok',
        'is_active',
        'is_featured',
        'on_sale',
    ];
 
    protected $casts = [
        'images' => 'array',
    ];

    // Accessor untuk mengecek apakah produk tersedia
    public function getIsAvailableAttribute()
    {
        return $this->stok > 0;
    }
 
    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function brand() {
        return $this->belongsTo(Brand::class);
     }
     
     public function orderItems() {
        return $this->hasMany(OrderItem::class);
     }

     public function getRouteKeyName()
    {
        return 'slug';
    }
}
