<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProjectRequest extends FormRequest
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
        return [
            'title' => 'required|unique:projects,title|max:100',
            'description' => 'nullable|max:300',
            'cover_image' => 'nullable|image|max:300',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'exists:technologies,id',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'Campo obbligatorio',
            'title.max' => 'Il titolo deve essere di massimo :max caratteri',
            'description.max' => 'La descrizione deve essere di massimo :max caratteri',
        ];
    }
}
