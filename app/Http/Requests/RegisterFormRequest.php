<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:students',
            'telephone' => 'nullable|unique:students',
            'surname' => 'required',
            'other_name' => 'required',
            'date_of_birth' => 'required|date',
            'gender' => 'required',
            'index_number_s_6' => 'required|unique:students',
            'college_id' => 'required',
            'department_id' => 'required',
        ];
    }
}
