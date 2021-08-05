<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $fillable = [
        'uid', 'store_lat', 'store_long',
        'store_name', 'store_reff'
    ];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_reff', 'id');
    }
}
