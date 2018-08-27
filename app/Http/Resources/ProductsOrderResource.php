<?php

namespace Logistic\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductsOrderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                =>  isset( $this->id ) ? $this->id : (int) 0,
            'quantity'          =>  isset( $this->quantity ) ? $this->quantity : (int) 0,
            'price'             =>  isset( $this->price ) ? $this->price : (double) 0,
            'received'          =>  isset( $this->received ) ? $this->received : (boolean) false,
            'purchase_order_id' =>  isset( $this->purchase_order_id ) ? $this->purchase_order_id : (int) 0,
            'product_id'        =>  isset( $this->product_id ) ? $this->product_id : (int) 0,
            'issues'            =>  IssueResource::collection( $this->whenLoaded('issues') ),
            'purchase_order'    =>  new PurchaseOrderResource( $this->whenLoaded('purchase_order') ),
            'product'           =>  new ProductResource( $this->whenLoaded( 'product' ) ),
            'created_at'        =>  isset( $this->created_at ) ? $this->created_at : null,
            'updated_at'        =>  isset( $this->updated_at ) ? $this->updated_at : null,
            'deleted_at'        =>  $this->when( isset( $this->deleted_at ),  $this->deleted_at ),
            'links'             =>  [
                'self' => '#',
            ],
        ];
    }
}
