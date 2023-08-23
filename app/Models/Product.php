<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id';
    // For Category
    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'product_category_id');
    }

    // For Brand
    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'product_id');
    }
}
