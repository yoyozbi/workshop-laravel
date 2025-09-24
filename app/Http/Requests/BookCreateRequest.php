<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|min:5|max:25',
            'isbn' => ['string', 'regex:/^(\d{3}-\d{2}-\d{5}-\d{2}-\d{1})|(\d{13})$/i'],
            'description' => 'required|string|min:5|max:200',
            'pages' => 'required|int|gt:0|lt:40000',
            'quantity' => 'required|int|min:0|max:99',
            'author_id' => 'required|exists:authors,id'
        ];
    }
}
