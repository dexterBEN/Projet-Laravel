<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
        //Règle de validation pour l'envoie du mail
        return [
            'name' => 'required|min:5',//Champ requis avec le minimum de caractère autorisé
            'email' => 'required|email',
            'message' => 'required|min:10'
        ];
    }
}
