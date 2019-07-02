<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class PermissionRequest extends FormRequest
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
            'module_id'=>'required|integer',
            'name'=>'string|max:191|required|unique:permissions'.(request()->method()=="POST"?'':',name,'.$this->id),
            'route'=>'required|string|max:191',
        ];
    }
    function messages()
    {
        return [
            'module_id.required'=>'Please Enter Module Id',
            'module_id.integer'=>'Module Id must be of integer type',
            'name.required'=>'Please Enter Your Name',
            'name.unique'=>'Name must be unique',
            'name.string'=>'Name must be of string type',
            'route.required'=>'Please Enter Route',
            'route.string'=>'Route must be of string type',
        ];
    }
}
