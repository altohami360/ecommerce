<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'slug' => ['string'],
            'category_id' => ['required'],
            'brand_id' => ['required'],
            'price' => ['required'],
            'sale_price' => ['nullable'],
            'quantity' => ['required', 'numeric'],
            'featured' => ['boolean'],
            'status' => ['boolean'],
        ];
    }
    
    protected function prepareForValidation()
    {
        $this->merge([
            'featured' => isset($this->featured) ?? false,
            'status' => isset($this->status) ?? false,
            'slug' => 'slug',
        ]);
    }
}
