<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;

class StoreTagRequest extends FormRequest
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
    protected function prepareForValidation()
    {
        $split = preg_split("/[^\w]*([\s]+[^\w]*|$)/", $this->tags, -1, PREG_SPLIT_NO_EMPTY);
//        dd($split);
        $words = [];
        for($i=0;$i<count($split);$i++)
        {
            if(strlen($split[$i])<=10)
            {
                $words [] = $split[$i];
            }
            if($i==10)
            {
                break;
            }
        }
        $this->merge([
            'tags' => $words,
        ]);
    }
    public function rules()
    {
        return [
            'name'=>['nullable'],
            'blog_id'=>['nullable'],
            'tags'=>['required']
        ];
    }
}
