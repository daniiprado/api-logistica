<?php

namespace Logistic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          =>  'required|string|max:60|unique:roles,name',
            'display_name'  =>  'required|string|max:60',
            'description'   =>  'required|string|max:191',
        ];
    }
}
