<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'lat', 'long', 'name_store'
    ];

    public function visitor()
    {
        return $this->hasMany(History::class, 'store_reff', 'id');
    }
}
