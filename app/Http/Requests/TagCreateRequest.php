<?php

namespace App\Http\Requests;

use App\Block;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Валидируем запрос на создание тега
 *
 * Class TagCreateRequest
 * @package App\Http\Requests
 *
 */
class TagCreateRequest extends FormRequest
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
            'tags' => 'nullable|max:5000',
        ];
    }
}
