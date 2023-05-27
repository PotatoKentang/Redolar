<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    function account()
    {
        return $this->belongsTo(Account::class);
    }
    function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
