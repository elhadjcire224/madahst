<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProjetStoreRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'nom' => ['required', 'string'],
            'date_debut' => ['required', 'date'],
            'date_fin' => ['required', 'date'],
            'cout_global' => ['required', 'integer'],
            'bilan' => ['required', 'integer'],
            'status' => ['required', 'string'],
            'owner_type' => ['required', 'string'],
            'owner_id' => ['required'],
        ];
    }
}
