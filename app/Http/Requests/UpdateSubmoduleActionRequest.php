<?php

namespace Logistic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSubmoduleActionRequest extends FormRequest
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
            'name'          =>  'required|string|max:60',
            'submodule_id ' =>  'required|numeric|exists:submodules,id'
        ];
    }
}
