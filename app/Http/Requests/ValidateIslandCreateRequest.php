<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;


class ValidateIslandCreateRequest extends FormRequest
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
            'name' => ['required'],
            'region_id' => ['required', 'exists:regions,id'],
            'population' => ['nullable'],
            'area_sq_km' => ['nullable'],
            'description' => ['nullable'],
            'image' => ['required', File::image()],
        ];
    }
}
