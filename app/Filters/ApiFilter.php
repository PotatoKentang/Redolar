<?php

namespace App\Filters\V1;

use Illuminate\Http\Request;

class ApiFilter
{
    protected $allowedParams=[];
    protected $mapColumn=[];
    protected $mapOperator=[
        'lt'=>'<',
        'gt'=>'>',
        'lte'=>'<=',
        'gte'=>'>=',
        'eq'=>'=',
    ];
    public function transform(Request $request)
    {
        $queryItems=[];
        foreach ($this->allowedParams as $params => $operator) {
            $value=$request->query($params); //if the params such as name exists then
            if (isset($value)) {
                $column=$this->mapColumn[$params] ?? $params; //parse the name if there is any needs
                $queryItems[]=[ // variable names [] == push in php
                    $column,
                    $this->mapOperator[$operator],
                    $value
                ];
            }
        }
        return $queryItems;
    }
}
