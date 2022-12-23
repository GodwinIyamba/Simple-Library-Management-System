<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorStoreRequest extends FormRequest
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
            'name' => 'required|unique:categories|string',
            'description' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Your author needs a name.',
            'name.unique' => 'Oops. Seems this author already exists.',
        ];
    }
}
