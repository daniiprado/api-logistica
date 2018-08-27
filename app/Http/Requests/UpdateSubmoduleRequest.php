<?php

namespace Logistic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubmoduleRequest extends FormRequest
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
            'name'          =>  'required|string|max:60',
            'module_id '    =>  'required|numeric|exists:modules,id'
        ];
    }
}
