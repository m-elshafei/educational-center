<?php

namespace App\Http\Requests;

use App\Models\Company;
use Illuminate\Foundation\Http\FormRequest;

class CreateCompanyRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return Company::$rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب',
            'tax_number.required' => 'حقل الرقم الضريبى مطلوب',
            'owner.required' => 'حقل المالك مطلوب'
        ];
    }
}
