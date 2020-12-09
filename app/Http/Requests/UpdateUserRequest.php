<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'prefixname' => ['nullable', 'string', Rule::in(['Mr', 'Ms', 'Mrs'])],
            'firstname' => ['required', 'string', 'max:255'],
            'middlename' => ['nullable', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'suffixname' => ['nullable', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user)->whereNull('deleted_at')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user)->whereNull('deleted_at')],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'photo' => ['nullable', 'mimes:jpeg,jpg,png',]
        ];
    }
}
