<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;
class UpdateProfileRequest extends FormRequest
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
            'name' => 'nullable|min:3|max:100',
            'phone' => 'nullable|min:11|max:14',
            'email' => 'nullable|email',
            'password' => ['nullable', 'max:100',
            Password::min(4)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'avatar' => 'nullable|image',
        ];
    }
}
