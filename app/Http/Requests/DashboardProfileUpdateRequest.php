<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class DashboardProfileUpdateRequest extends FormRequest
{
    private $user_id;

    public function __construct(Request $request)
    {
        parent::__construct();

        $this->user_id = $request->route('user');
        
    }
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
            'email' => 'required|email|max:200|unique:users,email,' . $this->user_id,
            'avatar' => ['nullable', 'image', 'max:3000'],
        ];
    }
}
