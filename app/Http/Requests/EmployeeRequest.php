<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
            'email' => 'required|email|max:255|unique:employees,email,' . $this->employee,
            'phone' => 'nullable|string|max:15',
            'profile' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'company_id' => 'required|exists:companies,id',
        ];
    }
}
