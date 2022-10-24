<?php

namespace App\Http\Requests\Attribute;

use Illuminate\Foundation\Http\FormRequest;

class StoreAttributeRequest extends FormRequest
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
            'code' => ['required', 'string', 'unique:attributes'],
            'name' => ['required', 'string'],
            'frontend_type' => ['required', 'string'],
            'is_required' => ['boolean'],
            'is_filterable' => ['boolean'],
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'is_required' => isset($this->is_required) ?? false,
            'is_filterable' => isset($this->is_filterable) ?? false,
        ]);
    }
}
