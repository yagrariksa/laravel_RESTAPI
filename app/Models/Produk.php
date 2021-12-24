<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'price', 'pict', 'user_id'];

    protected $hidden = [
        'id',
        'created_at',
        'updated_at',
        'user_id'
    ];
}
