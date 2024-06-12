<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTypeRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Assicurati di gestire l'autorizzazione come appropriato
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }
}