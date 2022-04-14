<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class GoogleRequest extends FormRequest
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
        if($this->analytic)
        {
            $this->merge([
                'analytics' => isset($this->analytics) ? true : false,
            ]);
        }
        if($this->fire)
        {
            $this->merge([
                'firebase' => isset($this->firebase) ? true : false,
            ]);
        }
    }
    public function rules()
    {
        return [
            'tracking_id'=>'nullable|max:100',
            'analytics'=>'nullable|boolean',
            'client_id'=>'nullable|max:20',
            'client_secret'=>'nullable',
            'firebase_key'=>'nullable|max:100',
            'firebase'=>'nullable|boolean'
        ];
    }
}
