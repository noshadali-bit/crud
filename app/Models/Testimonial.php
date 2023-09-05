<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'img_path',
        'is_active',
        'is_delete',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
   
}
