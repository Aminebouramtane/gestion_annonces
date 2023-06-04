<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AnnonceRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            "titre"=>["required",
                    Rule::unique("annonces")->ignore($this->annonce)],
            "description"=>"required|max:100",
            "type"=>"in:Maison,Appartement,Terrain,Magasin,Villa",
            "ville"=>"alpha",
            "superficie"=>"numeric|min:20",
            "prix"=>"numeric|min:0",
            "photo"=>"image|mimes:jpg,png,jpeg|max:8000"

        ];
    }
    public function messages()
    {
         return [
            "titre.required"=>"Le titre est obligatoire",
            "titre.unique"=>"Ce titre est déjà pris!",
            "description.required"=>"La description  est obligatoire",
            "description.max"=>"La description ne doit pas dépasser 100 caractères!",
            "type.in"=>"Le type doit avoir l'une des valeurs suivantes: Maison,Appartement,Terrain,Magasin,Villa",
            "ville.alpha"=>"La ville ne doit contenir que des lettres",
            "superficie.min"=>"La superficie minimale est 20 mettre carré",
            "prix.min"=>"Le prix doit être positif",
            "photo.image"=>"Vous devez choisir une image",
            "photo.mimes"=>"voici les exentions authorisées: jpg, png ou jpeg",

        ];
    }
}
