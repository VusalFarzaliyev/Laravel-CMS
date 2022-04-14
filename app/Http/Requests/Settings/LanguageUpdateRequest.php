<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class LanguageUpdateRequest extends FormRequest
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
        $this->merge([
            'status' => $this->status =='on' ? true : false,
        ]);

    }

    public function rules()
    {
        return [
            'name'=>'required|max:50|min:3',
            'code'=>'required|max:3|unique:setting_languages,code,'.$this->id,
            'status'=>'nullable|boolean',
        ];
    }
}
