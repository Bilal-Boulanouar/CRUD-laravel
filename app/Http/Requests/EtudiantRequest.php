<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EtudiantRequest extends FormRequest
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
            'nom' => 'required|alpha|max:255', // Obligatoire, alphabétiques, max 255 caractères
            'prenom' => 'required|alpha|max:255', // Obligatoire, alphabétiques, max 255 caractères
            'email' => 'required|email|unique:etudiants,email|max:255', // Obligatoire, format email, unique, max 255
            'date_naissance' => 'required|date', // Obligatoire, format de date valide
            'genre' => 'required|in:Homme,Femme', // Obligatoire, Homme ou Femme
            'niveau_etude' => 'required|max:255', // Obligatoire, max 255 caractères
            'image' => 'nullable|mimes:jpg,png|max:2048', // Facultatif, format JPG/PNG, taille max 2 Mo
        ];
    }
}
