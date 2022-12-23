<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RentBookRequest extends FormRequest
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
            'start_date' => 'required|string',
            'end_date' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'start_date.required' => 'A start date is required',
            'end_date.required' => 'You need to select a return date',
        ];
    }
}
