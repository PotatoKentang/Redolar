<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;

class ProductQuery extends ApiFilter
{
    protected $safeParams=[
        'name'=>['eq'],
        'description'=>['eq'],
        'images'=>['eq'],
        'storeID'=>['eq'],
        'price'=>['eq'],
    ];
    protected $mapColumn=[
        "storeId"=>"storeID"
    ];
}

