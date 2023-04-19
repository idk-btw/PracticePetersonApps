<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NoteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return match ($this->route()->getActionMethod()) {
            'create' => [
                'title' => 'required|string|max:255|unique:notes',
                'description' => 'required|string|max:255',
                'hours_spend' => 'numeric',
                'type' => 'required|string|max:25',
                'project_id' => 'required|integer'
            ],
            'update' => [
                'title' => 'required|string|max:255|unique:notes',
                'description' => 'required|string|max:255',
                'hours_spend' => 'numeric|min:0.01',
                'type' => 'required|string|max:25'
            ],
            'updateStage' =>[
                'stage' => 'required|numeric'
            ]
        };
    }
}
