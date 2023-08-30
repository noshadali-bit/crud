<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagetable extends Model
{
    use HasFactory;

    protected $fillable = [
        'table_name',
        'img_path',
        'headings',
        'is_active',
        'is_delete',
    ];
}
