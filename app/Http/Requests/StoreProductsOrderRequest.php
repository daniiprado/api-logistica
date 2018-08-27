<?php

namespace Logistic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductsOrderRequest extends FormRequest
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
            'quantity'          =>  'required|numeric|min:1',
            'price'             =>  'required|numeric|min:50',
            'received'          =>  'required|boolean',
            'purchase_order_id' =>  'required|numeric|exists:purchases_orders,id',
            'product_id'        =>  'required|numeric|exists:products,id',
        ];
    }
}
