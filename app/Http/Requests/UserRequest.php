<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'name'  => 'min:4|max:50|required',
                    'email' => 'min:5|max:100|unique:users|required|email',
                    'password'  => 'min:4|max:50|required',
                ];
            }
            case 'PUT':
                return [
                    'name'  => 'min:4|max:50|required',
                    'email' => 'min:5|max:100|email|required|unique:users,email,'. $this->user,
                ];
            default:break;
        }
    }
}
