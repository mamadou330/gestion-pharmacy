<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'produit' => 'required|string|min:2|max:255',
            'description' => 'nullable|string|min:2|max:255',
            'unite' =>  'nullable|integer',
            'categorie' => 'nullable|integer',
            'famille' => 'nullable|integer',
            'date_production' => 'required|date|before:date_peremption',
            'date_peremption' => 'required|date|after:date_production'
        ];
    }


    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'produit.required' => "Le nom du produit est obligatoire",
            'produit.string' => "Le nom du produit doit être une chaîne de caractères.",
            'produit.min' => "Le nom du produit doit contenir au moins :min caractères.",
            'produit.max' => "Le nom du produit ne peut contenir plus de :max caractères.",

            'date_production.required' => 'La date de production est obligatoire.',
            'date_production.date' => "La date de production n'est pas une date valide.",
            'date_production.before' => "La date de production doit être avant la date d'expiration du produit.",

            'date_peremption.required' => 'La date de production est obligatoire.',
            'date_peremption.date' => "La date de production n'est pas une date valide.",
            'date_peremption.after' => "La date d'expiration doit être après la date de production du produit.",
        ];
    }
}
