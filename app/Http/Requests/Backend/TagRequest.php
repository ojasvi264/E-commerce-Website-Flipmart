<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class TagRequest extends FormRequest
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
            'name'=>'required|string|max:191|unique:tags'.(request()->method()=="POST"?'':',name,'.$this->id),
            'rank'=>'required|integer',
            'slug'=>'required|string|max:191|unique:tags'.(request()->method()=="POST"?'':',slug,'.$this->id),
            'meta_keyword'=>'string|max:191',
            'meta_description'=>'string|max:191',
        ];
    }

    function messages()
    {
       return[
           'name.required'=>'Please Enter Your Name',
           'name.unique'=>'Name must be unique',
           'name.string'=>'Name must be of string type',
           'rank.required'=>'Please Enter Rank',
           'rank.integer'=>'Rank must be of integer type',
           'slug.required'=>'Please Enter Slug',
           'slug.unique'=>'Slug must be unique',
           'slug.integer'=>'Slug must be of integer type',
           'meta_keyword.string'=>'Please Enter String',
           'meta_description.string'=>'Please Enter String',

       ];
    }
}
