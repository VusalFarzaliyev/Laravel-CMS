<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class FacebookRequest extends FormRequest
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
        if($this->chat)
        {
            $this->merge([
                'chat_status' => isset($this->chat_status) ? true : false,
            ]);
        }
        if($this->pixel)
        {
            $this->merge([
                'pixel_status' => isset($this->pixel_status) ? true : false,
            ]);
        }
    }
    public function rules()
    {
        return [
            'chat_id'=>'nullable|max:20',
            'chat_status'=>'nullable|boolean',
            'client_id'=>'nullable|max:20',
            'client_secret'=>'nullable',
            'pixel_id'=>'nullable|max:20',
            'pixel_status'=>'nullable|boolean'
        ];
    }
}
