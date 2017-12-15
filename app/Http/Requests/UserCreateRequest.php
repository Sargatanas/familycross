<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Валидация запроса на создания новой записки
 *
 * Class NoteCreateRequest
 * @package App\Http\Requests
 *
 * @property string $title
 */
class UserCreateRequest extends FormRequest
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
            'name' => 'required|max:100',
            'email' => 'string|max:100',
            'password' => 'string|min:6',
            're_password' => 'string|min:6'
        ];
    }
}
