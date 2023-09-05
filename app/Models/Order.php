<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        "name",
        "phone",
        "email",
        "note",
        "order_amount",
        "order_response",
        "pay_status",
        'is_active',
        'is_delete',
        
    ];
    public function users()
    {
        return $this->hasMany(User::class);
        // return $this->hasMany(User::class, 'user_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
        // return $this->hasMany(products::class, 'product_id');
    }
    public function order()
    {
        return $this->belongsTo(Order::class);
        // return $this->belongsTo(products::class, 'product_id');
    }
}
