<?php

namespace App\Http\Requests;

use App\Models\Branch;
use Illuminate\Foundation\Http\FormRequest;

class CreateBranchRequest extends FormRequest
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
        return Branch::$rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'حقل الاسم مطلوب',
            'location.required' => 'حقل الموقع مطلوب',
            'company_id.required' => 'حقل الشركه مطلوب',
        ];
    }
}
