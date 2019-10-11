<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CommentFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {  
        $user=Auth::user();
        return $user->role==config('samk.roles')[1] || $user->role=='admin';
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
            'author_function'=>'required',
            'source'=>'required|file|image|mimes:png,jpeg,jpg,gif,bmp',
            'comment'=>'required'

        ];
    }
}
