<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
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
            'name' => 'required|max:200',
            'code' => 'required|max:20|unique:items,code,' . $this->item,
            'cost' => 'nullable|numeric|min:0',
            'min' => 'nullable|numeric|min:0',
            'max' => 'nullable|numeric|min:0',
            'on_hand' => 'nullable|numeric|min:0',
            'family_id' => 'exists:families,id',
            'unit_id' => 'exists:units,id',
            'tax_id' => 'required|exists:taxes,id',
            'is_service' => 'required|boolean',
            'ieps' => 'nullable|numeric|min:0',
        ];
    }
}
