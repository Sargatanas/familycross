<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Валидируем запрос на создание записки
 *
 * App\Http\Requests\NoteElementCreateRequest
 *
 * @property integer $order
 * @property string|null $heading
 * @property string $content
 */
class NoteElementCreateRequest extends FormRequest
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
            'type' => [
                'required',
                Rule::in('text', 'important', 'code', 'task', 'literature')
            ],
            'order' => 'required|max:255',
            'heading' => 'nullable|max:255',
            'content' => 'max:5000',
        ];
    }
}
