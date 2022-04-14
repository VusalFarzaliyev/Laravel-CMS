<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class SMTPRequest extends FormRequest
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
            'port'=>'nullable|max:10',
            'host'=>'nullable|max:60',
            'username'=>'nullable|max:120',
            'password'=>'nullable|password|max:120',
            'encryption'=>'nullable|max:20',
            'sender_name'=>'nullable|max:60',
            'sender_email'=>'nullable|email|max:60',
        ];
    }
}
