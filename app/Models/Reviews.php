<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'product_id',

        'name',
        'description',
        'img_path',
        'rating',

        'is_active',
        'is_delete',
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
        // return $this->hasMany(Product::class, 'product_id');
    }
    public function users()
    {
        return $this->hasMany(Users::class);
        // return $this->hasMany(Users::class, 'user_id');
    }

}
