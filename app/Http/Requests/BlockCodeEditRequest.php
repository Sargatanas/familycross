<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class BlockCodeEditRequest
 * @package App\Http\Requests
 *
 * @property int $order
 * @property string $heading
 * @property string $content
 */
class BlockCodeEditRequest extends FormRequest
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
            'order' => 'required|integer',
            'heading' => 'nullable|max:255',
            'content' => 'string|max:5000',
        ];
    }
}
