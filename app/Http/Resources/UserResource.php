<?php

namespace Logistic\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id'            =>  isset( $this->id ) ? $this->id : (int) 0,
            'name'          =>  isset( $this->name ) ? $this->name : null,
            'email'         =>  isset( $this->email ) ? $this->email : null,
            'company_id'    =>  isset( $this->company_id ) ? $this->company_id : (int) 0,
            'company'       =>  new CompanyResource( $this->whenLoaded('company') ),
            'created_at'    =>  isset( $this->created_at ) ? $this->created_at : null,
            'updated_at'    =>  isset( $this->updated_at ) ? $this->updated_at : null,
            'deleted_at'    =>  $this->when( isset( $this->deleted_at ),  $this->deleted_at ),
            'links'         =>  [
                'self' => '#',
            ],
        ];
    }
}
