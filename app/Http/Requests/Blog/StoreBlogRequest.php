<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'publisher'=>auth()->user()->id,
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>['required','max:100','min:3'],
            'publisher'=>['required','integer','exists:users,id'],
            'category_id'=>['required','integer','exists:categories,id'],
            'status'=>['required','in:0,1'],
            'content'=>['required'],
            'subdesc'=>['nullable'],
            'seo_title'=>['nullable'],
            'seo_keyword'=>['nullable'],
            'seo_description'=>['nullable'],
            'image'=>['required'],
            'images'=>['nullable'],
            'tags' => ['nullable'],

        ];
    }
}
