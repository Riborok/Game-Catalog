<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddFeatureRequest extends FormRequest
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
            'new-title' => ['required', 'string', 'max:255'],
            'new-text' => ['required', 'string', 'max:1000'],
            'new-image' => ['required', 'string', 'max:255'],
            'new-order' => ['required', 'string', 'in:first,second'],
        ];
    }
}
