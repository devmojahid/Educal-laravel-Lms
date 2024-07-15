<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookCategoryRequest extends FormRequest
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
            'svg'           => 'nullable|file|mimes:svg,jpeg,png,jpg,gif,svg|max:2048',
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
            'title.required' => 'Book Category Title is Required',
            'svg.file' => 'The file must be a file',
            'svg.mimes' => 'The file must be a file of type: svg, jpeg, png, jpg, gif, svg',
            'svg.max' => 'The file may not be greater than 2048 kilobytes',
        ];
    }
}
