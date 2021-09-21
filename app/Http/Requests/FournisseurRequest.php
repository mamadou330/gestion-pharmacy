<?php

namespace App\Http\Requests;

use App\Rules\EmailLower;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FournisseurRequest extends FormRequest
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
        if(request()->routeIs('fournisseur.store')) {
            $phoneRule = ['required', 'string', 'min:9', 'max:255', Rule::unique('fournisseurs')];
        } elseif(request()->routeIs('fournisseur.update')) {
           $phoneRule = ['required', 'string', 'min:9', 'max:255'];
        }
        
        return [
           
        ];
    }

    
}
