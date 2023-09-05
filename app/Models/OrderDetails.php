<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'details',
        'total_amount',
        'is_active',
        'is_delete',
    ];
    public function Orders()
    {
        return $this->hasMany(Order::class);
    }
}
