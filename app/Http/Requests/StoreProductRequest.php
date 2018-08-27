<?php

namespace Logistic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'code'          =>  'required|string|unique:companies,code',
            'name'          =>  'required|string|max:191',
            'stock'         =>  'required|numeric|min:1',
            'price'         =>  'required|min:50|numeric',
            'company_id'    =>  'required|numeric|exists:companies,id',
            'expired_at'    =>  'required|date|after:now',
        ];
    }
}
