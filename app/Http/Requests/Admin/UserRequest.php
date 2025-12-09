<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
        $rules = [
            'name' => 'required|string|max:255',
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => 'required|string|max:15',
            'status' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'role_id' => 'required|exists:roles,id'
        ];

        if ($this->isMethod('POST')) {
            $rules['email'][] = 'unique:users,email';
            $rules['password'] = 'required|string|min:6|confirmed';
        }

        if ($this->isMethod('PATCH')) {
            $rules['email'][] = Rule::unique('users')->ignore($this->user->id);
            $rules['password'] = 'nullable|string|min:6|confirmed';
        }

        return $rules;
    }
}
