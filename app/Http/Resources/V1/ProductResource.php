<?php

namespace App\Http\Resources\V1;

use App\Models\Review;
use App\Models\Shop;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'description'=>$this->description,
            'images'=>$this->images,
            'price'=>$this->price,
            'shop_id' => ShopResource::make($this->whenLoaded('shop', function () {
                return $this->shop;
            })),
            'reviews' => ReviewResource::collection($this->whenLoaded('reviews', function () {
                return $this->reviews;
            }))
        ];
    }
}
