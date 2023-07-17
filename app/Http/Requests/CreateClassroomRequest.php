<?php

namespace App\Http\Requests;

use App\Models\ClassRoom;
use Illuminate\Foundation\Http\FormRequest;

class CreateClassroomRequest extends FormRequest
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
        return ClassRoom::$rules;
    }
    public function messages()
    {
        return  [
            'name.required' => 'حقل الاسم مطلوب',
            'capacity.required' => 'حقل سعه الفصل مطلوب',
            'branch_id.required' => 'حقل الفرع مطلوب'
        ];
    }
}
