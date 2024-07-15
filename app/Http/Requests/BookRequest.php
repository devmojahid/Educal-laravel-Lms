<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
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
            'title'         => 'required',
            'description'   => 'nullable',
            'short_description' => 'nullable',
            'image'         =>     $this->book ? ['nullable', 'file', 'mimes:svg,jpeg,png,jpg,gif,webp', 'max:2048'] : ['required', 'file', 'mimes:svg,jpeg,png,jpg,gif,webp', 'max:2048'],
            'price'         => 'numeric|nullable|between:0,9999999999.99',
            'discount_price' => 'numeric|nullable|between:0,9999999999.99|lte:price',
            'stock'         => 'integer|nullable',
            'sold'          => 'integer|nullable',
            'book_pages'    => 'integer|nullable',
            'book_file'     => 'nullable|file|mimes:pdf,doc,docx,txt|max:10240',
            'product_type'  => 'nullable',
            'specifications' => 'nullable|array',
            'specifications.*.key' => 'required_with:specifications.*.value|string',
            'specifications.*.value' => 'required_with:specifications.*.key|string',
            'language'      => 'nullable',
            'edition'       => 'nullable',
            'category_id'   => 'nullable',
            'genre_id'      => 'nullable',
            'author_id'     => 'nullable',
            'deleted_by'    => 'nullable',
            'status'        => 'nullable',
            'meta_title'    => 'nullable',
            'meta_description' => 'nullable',
            'meta_keywords' => 'nullable',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */

    public function messages(): array
    {
        return [
            'title.required' => 'Title is Required',
            'image.required' => 'Image is Required',
            'svg.file' => 'The file must be a file',
            'svg.mimes' => 'The file must be a file of type: svg, jpeg, png, jpg, gif, svg',
            'svg.max' => 'The file may not be greater than 2048 kilobytes',
            'specifications.*.key.required_with' => 'Specification Key is Required',
            'specifications.*.key.string' => 'Specification Key must be a string',
            'specifications.*.value.required_with' => 'Specification Value is Required',
            'specifications.*.value.string' => 'Specification Value must be a string',

        ];
    }
}
