<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
                    'title'         => 'min:6|max:100|required|unique:articles',
                    'category_id'   => 'required',
                    'content'       => 'min:40|max:1000|required',
                    'image'         => 'required|image'
                ];
            }
            case 'PUT':
                return [
                    'title'         => 'min:6|max:100|required|unique:articles,title,'.$this->article,
                    'category_id'   => 'required',
                    'content'       => 'min:40|max:1000|required',
                ];
            default:break;
        }
    }
}
