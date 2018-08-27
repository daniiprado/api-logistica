<?php

namespace Logistic\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePermissionRequest extends FormRequest
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
            'name'          =>  'required|string|max:60|unique:permissions,name,'.$this->get('id'),
            'display_name'  =>  'required|string|max:60',
            'description'   =>  'required|string|max:191',
            'submodule_action_id' => 'required|numeric|exists:submodules_actions,id'
        ];
    }
}
