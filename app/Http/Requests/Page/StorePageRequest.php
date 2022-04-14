<?php

namespace App\Http\Requests\Page;

use Illuminate\Foundation\Http\FormRequest;

class StorePageRequest extends FormRequest
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

    public function rules()
    {
        return [
            'title'=>['required','min:3','max:255'],
            'desc'=>['nullable'],
            'seo_title'=>['nullable'],
            'seo_keyword'=>['nullable'],
            'seo_desc'=>['nullable'],
            'link'=>['nullable','unique:pages'],
        ];
    }
}