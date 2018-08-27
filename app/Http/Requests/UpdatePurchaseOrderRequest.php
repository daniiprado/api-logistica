<?php

namespace Logistic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePurchaseOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'delivery_address'  => 'required|string|max:191',
            'delivery_at'       => 'required|date|after_or_equal:requested_at',
            'requested_at'      => 'required|date|after_or_equal:now',
            'status_id'         => 'required|numeric|exists:status,id',
            'user_id'           => 'required|numeric|exists:users,id',
            'products'          =>  'required|array',
            'products.*.quantity'          =>  'required|numeric|min:1',
            'products.*.price'             =>  'required|numeric|min:50',
            'products.*.received'          =>  'required|boolean',
            'products.*.purchase_order_id' =>  'required|numeric|exists:purchases_orders,id',
            'products.*.product_id'        =>  'required|numeric|exists:products,id',
        ];
    }
}
