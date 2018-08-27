<?php

namespace Logistic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateIssueRequest extends FormRequest
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
            'issue'             =>  'required|string|max:2500',
            'attachment'        =>  'nullable|file',
            'products_order_id' =>  'required|numeric|exists:products_order,id',
        ];
    }
}
