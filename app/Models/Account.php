<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'images',
        'account_id'
    ];
    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
    public function shop()
    {
        return $this->hasOne(Shop::class);
    }

}
