<?php

namespace App\Filters;

use Illuminate\Http\Request;

class ApiFilter
{
    protected $safeParams=[];
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
        foreach ($this->safeParams as $params => $operators) {
            $query=$request->query($params); //if the params such as name exists then
            if (!isset($query)) continue;
            //since there may be multiple operators
            $column=$this->mapColumn[$params] ?? $params; //parse the name if there is any needs
            foreach ($operators as $operator) {
                if(isset($query[$operator])) {
                    $queryItems[]=[ // variable names [] == push in php
                        $column,
                        $this->mapOperator[$operator],
                        $query[$operator]
                    ];
                }
            }

        }
        return $queryItems;
    }
}
