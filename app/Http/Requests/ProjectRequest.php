<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
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
            'title' => 'required|min:3|max:150',
            'category' => 'required|min:3|max:150',
            'description' => 'required|min:10|max:1000',
            'path_img' => 'min:3|image',
            'img_original_name' => 'min:3',
            'start_date' => 'required|date',
            'end_date' => 'date',
            'project_url' => 'required|min:5|max:500',
        ];
    }

    public function messages(){
        return [
            'title.required' => 'Il titolo è un campo obbligatorio.',
            'title.min' => 'Il titolo deve avere almeno :min caratteri.',
            'title.max' => 'Il titolo non può superare i :max caratteri.',
        
            'category.required' => 'La categoria è un campo obbligatorio.',
            'category.min' => 'La categoria deve avere almeno :min caratteri.',
            'category.max' => 'La categoria non può superare i :max caratteri.',
        
            'description.required' => 'La descrizione è un campo obbligatorio.',
            'description.min' => 'La descrizione deve avere almeno :min caratteri.',
            'description.max' => 'La descrizione non può superare i :max caratteri.',

            'path_img.min' => 'Il percorso dell\'immagine deve avere almeno :min caratteri.',
            'path_img.image' => 'Il percorso dell\'immagine deve richiamare un\'immagine.',

            'img_original_name.min' => 'Il nome originale dell\'immagine deve avere almeno :min caratteri.',
        
            'start_date.required' => 'La data di inizio è un campo obbligatorio.',
            'start_date.date' => 'La data di inizio deve essere una data valida.',
        
            'end_date.date' => 'La data di fine deve essere una data valida.',
        
            'project_url.required' => 'L\'URL del progetto è un campo obbligatorio.',
            'project_url.min' => 'L\'URL del progetto deve avere almeno :min caratteri.',
            'project_url.max' => 'L\'URL del progetto non può superare i :max caratteri.',
        ];
        
    }
}
