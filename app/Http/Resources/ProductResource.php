<?php

namespace Logistic\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id'            => isset( $this->id ) ? $this->id : null,
            'code'          => isset( $this->code ) ? $this->code : null,
            'name'          => isset( $this->name ) ? $this->name : null,
            'stock'         => isset( $this->stock ) ? $this->stock : (int) 0,
            'price'         => isset( $this->price ) ? $this->price : (double) 0,
            'company_id'    => isset( $this->company_id ) ? $this->company_id : null,
            'company'       =>  new CompanyResource( $this->whenLoaded('company') ),
            'expired_at'    => isset( $this->expired_at ) ? $this->expired_at : null,
            'created_at'    =>  isset( $this->created_at ) ? $this->created_at : null,
            'updated_at'    =>  isset( $this->updated_at ) ? $this->updated_at : null,
            'deleted_at'    =>  $this->when( isset( $this->deleted_at ),  $this->deleted_at ),
            'links'         =>  [
                'self' => '#',
            ],
        ];
    }
}
