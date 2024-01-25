<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'name' => 'required|string|max:200',
            'tax_id' => 'required|string|max:13',
            'address' => 'required|string|max:200',
            'contact' => 'required|string|max:200',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:200',
            'pay_days' => 'nullable|numeric|min:0',
            'delivery_time' => 'nullable|numeric|min:0',
            'balance' => 'nullable|numeric|min:0',
            'total' => 'nullable|numeric|min:0',    
        ];
    }
}
