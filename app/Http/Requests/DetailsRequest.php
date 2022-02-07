<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DetailsRequest extends FormRequest
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
            'name' => 'required|min:3|max:300',
            'description' => 'required|min:5|max:1000',
            'deadline' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Поле имя является обязательным для заполнения.',
            'name.min' => 'Имя должно состоять не менее чем из 3 символов.',
            'name.max' => 'Имя не должно превышать 300 символов.',
            'description.required' => 'Поле описание является обязательным для заполнения.',
            'description.min' => 'Описание должно состоять не менее чем из 5 символов.',
            'description.max' => 'Описание не должно превышать 1000 символов.',
            'deadline.required' => 'Поле крайний срок является обязательным для заполнения.',
            'deadline.after' => 'Крайний срок должен быть послезавтра.',
        ];
    }
}
