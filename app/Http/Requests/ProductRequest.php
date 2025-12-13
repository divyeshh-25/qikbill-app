<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'sku'            => ['required', 'string', 'max:255'],
            'name'           => ['required', 'string', 'max:255'],
            'category_id'    => ['required', 'exists:categories,id'],
            'price'          => ['required', 'numeric', 'min:0'],
            'cost_price'     => ['required', 'numeric', 'min:0'],
            'stock_quantity' => ['required', 'integer', 'min:0'],
            'description'    => ['required', 'string'],
            'image' => 'nullable'
        ];

        if ($this->isMethod('post')) {
            $rules['sku'][]  = Rule::unique('products', 'sku');
            $rules['name'][] = Rule::unique('products', 'name');
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            $productId = $this->route('product');
            $rules['sku'][]  = Rule::unique('products', 'sku')->ignore($productId);
            $rules['name'][] = Rule::unique('products', 'name')->ignore($productId);
        }

        return $rules;
    }
}
