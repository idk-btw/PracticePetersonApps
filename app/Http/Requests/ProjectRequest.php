<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProjectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return match ($this->route()->getActionMethod()) {
            'create' => [
                'title' => 'required|string|max:25|unique:projects',
                'description' => 'required|string|max:255',
                'type' => 'required|string|max:25'
            ],
            'update' => [
                'description' => 'required|string|max:255',
                'type' => 'required|string|max:25',
                'title' => 'required|string|max:25',
                Rule::unique('projects', 'title')->ignore($this->projects)
            ]
        };
    }
}
