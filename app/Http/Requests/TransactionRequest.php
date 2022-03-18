<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TransactionRequest extends FormRequest
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
            'book_id' => 'required|exists:App\Models\Book,id',
            'student_id' => 'required|exists:App\Models\Student,id',
            'date_start' => 'required|date',
            'date_end' => 'required|date|after:date_start',
            'status' => 'sometimes|boolean'
        ];
    }
}
