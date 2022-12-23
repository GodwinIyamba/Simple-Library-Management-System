<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookCopyRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'qrcode' => 'required|unique:copies|string',
            'book_id' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'qrcode.required' => 'Your book copy needs a QRCODE.',
            'book_id.required' => 'Your book copy belongs to a book. Add one.',
        ];
    }
}
