<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Job;

class EmployerJobRequest extends FormRequest
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
            'title' => ['required', 'string', 'min:3', 'max:50'],
            'description' => ['required', 'string', 'min:3'],
            'location' => ['required', 'string', 'min:3'],
            'salary' => ['required', 'numeric', 'between:4000,500000'],
            'category' => ['required', Rule::in(Job::$category)],
            'experience' => ['required', Rule::in(Job::$experience)]
        ];
    }
}
