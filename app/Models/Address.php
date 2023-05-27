<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable=[
        'account_id',
        'street',
        'city',
        'state',
        'country',
        'zip_code'
    ];
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }
}
