<?php

namespace App\Http\Requests\Client;

use App\Enums\Genre;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Str;

class ClientStoreRequest extends FormRequest
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
            'nom' => ['required', 'max:255'],
            'prenom' => 'required|max:12',
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'addresse' => ['required', 'min:4'],
            'telephone' => ['required', 'unique:users,telephone'],
            'genre' => ['required', Rule::enum(Genre::class)],
            'nationalite' => ['required', 'max:20', 'min:5'],
            'dob' => 'required|date',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif',
        ];
    }
}
