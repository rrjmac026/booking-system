<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
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
            'student_id' => 'required|string|unique:students,student_id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'course' => 'required|string|max:255',
            'college' => 'required|string|max:255',
            'school_year' => 'required|string|max:20',
        ];
    }

    public function messages(): array
    {
        return [
            'student_id.required' => 'The student ID is required.',
            'student_id.string' => 'The student ID must be a valid string.',
            'student_id.unique' => 'This student ID already exists.',

            'name.required' => 'The student name is required.',
            'name.string' => 'The student name must be a valid string.',
            'name.max' => 'The student name may not be greater than 255 characters.',

            'email.required' => 'The email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email address is already in use.',

            'course.required' => 'The course field is required.',
            'course.string' => 'The course must be a valid string.',
            'course.max' => 'The course may not be greater than 255 characters.',

            'college.required' => 'The college field is required.',
            'college.string' => 'The college must be a valid string.',
            'college.max' => 'The college may not be greater than 255 characters.',

            'school_year.required' => 'The school year is required.',
            'school_year.string' => 'The school year must be a valid string.',
            'school_year.max' => 'The school year may not be greater than 20 characters.',
        ];
    }
}
