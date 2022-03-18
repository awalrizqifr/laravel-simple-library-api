<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
        $bookId = $this->route('book.id');

        return [
            'isbn' => ['required', Rule::unique('books')->ignore($bookId)],
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'released_year' => 'required|digits:4|integer|min:1900|max:'.(date('Y')+1)
        ];
    }
}
