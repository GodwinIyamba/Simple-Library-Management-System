<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
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
            'title' => 'required|string',
            'description' => 'required',
            'isbn' => 'required|string',
            'edition' => 'required|string',
            'category_id' => 'required',
            'author_id' => 'required',
            'book_cover' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'You should consider adding a book title.',
            'description.required' => 'Description help readers understand a book. Add one.',
            'edition.required' => 'Editions tell us what versions of books exist.',
            'author_id.required' => 'A book should belong to an author',
            'category_id.required' => 'A book should belong to a category',
            'book_cover.required' => 'Hey, a book needs a cover :).',
        ];
    }
}
