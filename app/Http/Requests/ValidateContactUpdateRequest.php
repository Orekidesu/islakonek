<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use log
use Illuminate\Support\Facades\Log;



class ValidateContactUpdateRequest extends FormRequest
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
        $contactId = $this->route('contact')->id;

        Log::debug('Contact ID:', ['contact_id' => $contactId]);
        return [

            'name' => 'required',
            // 'email' => 'required|email|unique:contacts,email,' . $this->contact->id,
            'email' => 'required|email|unique:contacts,email,' . $contactId,
            'phone' => 'required',
            'status' => 'required',
            'photo' => 'nullable',
            'island_id' => 'required|exists:islands,id',
        ];
    }
}
