<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductAttributeRequest extends FormRequest
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
            'attribute_id' => ['required', 'integer'],
            'value' => ['required', 'string'],
            'price' => ['required'],
            'quantity' => ['required'],
            'sku' => ['required'],

            // 'attribute[attribute_id][*]' => ['required', 'integer'],
            // 'attribute[value][*]' => ['required', 'string'],
            // 'attribute[price][*]' => ['required'],
            // 'attribute[quantity][*]' => ['required'],
            // 'attribute[sku][*]' => ['required'],
        ];
    }
}
