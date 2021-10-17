<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
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
             'name' => ['required', 'min:3',],
             'price' => ['required','integer', 'min:1'],
             'processTime' => ['required','integer', 'min:1'],
             'image' => ['required',]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'โปรดกรอกชื่อเมนู',
            'price.required' => 'โปรดกรอกราคา',
            'processTime.required' => 'โปรดกรอกระยะเวลาในการทำ',
            'name.min' => 'ต้องการชื่ออย่างน้อย 3 ตัวอักษร',
            'price.min' => 'ต้องการราคามากกว่า 1 บาท',
            'processTime.min' => 'ต้องการระยะเวลาในการทำมากกว่า 1 นาที',
            'image.required' => 'โปรดใส่รูป',

        ];
    }
}
