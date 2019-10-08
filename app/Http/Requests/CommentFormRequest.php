<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentFormRequest extends FormRequest
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
            'author_name'=>'required|unique:comments',
            'author_function'=>'reuired',
            'source'=>'file|image|mimes:png,jpeg,jpg,gif,bmp',
            'comment'=>'required'

        ];
    }
}
