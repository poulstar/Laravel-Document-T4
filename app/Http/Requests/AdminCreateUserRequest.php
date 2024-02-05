<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Enum\Roles;
use Illuminate\Validation\Rules\Password;

class AdminCreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if (Auth::user()->getRoleNames()[0] !== Roles::ADMIN) {
            return false;
        }else {
            return true;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:100',
            'phone' => 'required|unique:users,phone|min:11|max:14',
            'email' => 'required|unique:users,email|email',
            'password' => ['required', 'max:100',
            Password::min(4)->letters()->mixedCase()->numbers()->symbols()->uncompromised()],
            'avatar' => 'required|image|mimes:gif,ico,jpg,jpeg,tiff,jpeg,png,svg',
            'role' => 'required|in:admin,user',
        ];
    }
}
