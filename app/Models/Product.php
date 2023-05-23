<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'images',
        'price',
        'quantity',
        'shop_id'
    ];
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
