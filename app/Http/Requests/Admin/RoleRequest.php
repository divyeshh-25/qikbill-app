<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoleRequest extends FormRequest
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
        switch($this->method()){
            case 'POST':
                return [
                    'name' => 'required|string|max:255|unique:roles,name',
                    'status' => 'required',
                ];
                break;
            case 'PATCH':
                return [
                    'name' => 'required|string|max:255|unique:roles,name,'.$this->role->id,
                    'status' => 'required',
                ];
                break;
            default:
                return [];
        }
    }
}
