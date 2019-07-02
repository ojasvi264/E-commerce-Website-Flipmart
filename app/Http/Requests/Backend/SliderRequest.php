<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class SliderRequest extends FormRequest
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
            'title'=>'required|string',
            'description'=>'required|string',
            'Image'=>'file',
            'link'=>'required|string',
        ];
    }
    function messages()
    {
        return [
          'title.required'=>'Title field is required',
          'title.string'=>'Title field must be string type',
          'description.required'=>'Description field is required',
          'description.string'=>'Description field must be string type',
          //'Image.required'=>'Image field is required',
          'Image.file'=>'Image file must be file type',
          'link.required'=>'Link field is required',
          'link.string'=>'Link field must be string type',
        ];
    }
}
