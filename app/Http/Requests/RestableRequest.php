<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestableRequest extends FormRequest
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
            'name' => ['required', 'min:2', ],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'โปรดกรอกชื่อโต๊ะ',
            'name.min' => 'ต้องการชื่ออย่างน้อย 2 ตัวอักษร',
        ];
    }
}
