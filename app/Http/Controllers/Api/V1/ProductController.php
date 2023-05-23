<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Controllers\QueryHandler;
use App\Http\Resources\V1\ProductResource;
use App\Http\Resources\V1\ProductCollection;
use App\Http\Requests\V1\StoreProductRequest;
use App\Http\Requests\V1\UpdateProductRequest;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Filters\V1\ProductQuery;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private static $hash = [
        "includeReviews" => "reviews",
        "includeShop" => "shop",
    ];

    public function index(Request $request)
    {
        $filter = new ProductQuery();
        $queryItems = $filter->transform($request);//['column','operator','value']
        $product = Product::where($queryItems);
        $product = QueryHandler::includeData(self::$hash,$request,$product);
        $product = $product->paginate()->appends($request->query());
        return new ProductCollection($product);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product=Product::create($request->all());
        return ProductResource::make($product);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = QueryHandler::includeMissing(self::$hash, request(), $product);
        return ProductResource::make($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProductRequest  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $product->update($request->all());
        return ProductResource::make($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
    }
}
