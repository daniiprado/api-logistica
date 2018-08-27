<?php

namespace Logistic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCompanyRequest extends FormRequest
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
            'name'  =>  'required|string|max:191',
            'nit'   =>  'required|numeric|max:12|unique:companies,nit',
            'phone' =>  'required|numeric|max:12',
        ];
    }
}
