<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'id';

    // For User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function order_items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }
    
}
