<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanySettingRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:15',
            'address' => 'required|string',
            'logo' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            'favicon' => 'nullable|image|mimes:jpg,png,jpeg,ico|max:2048',
            'show_logo_or_name' => 'required|in:logo,name',
        ];
    }
}
