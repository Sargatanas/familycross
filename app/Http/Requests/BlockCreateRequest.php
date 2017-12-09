<?php

namespace App\Http\Requests;

use App\Block;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

/**
 * Валидируем запрос на создание блока
 *
 * Class BlockCreateRequest
 * @package App\Http\Requests
 *
 * @property string $type Тип создаваемого блока
 */
class BlockCreateRequest extends FormRequest
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
                Rule::in([Block::TYPE_TEXT, Block::TYPE_CODE, Block::TYPE_IMPORTANT,
                          Block::TYPE_LITERATURE, Block::TYPE_TASK, Block::TYPE_PICTURE])
            ]
        ];
    }
}
