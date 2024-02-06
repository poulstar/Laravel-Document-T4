<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use App\Enum\Permissions;

class CommentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        if ($this->isMethod('post')) {
            if (Auth::user()->hasPermissionTo(Permissions::CREATE_ANY_COMMENT)) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        if ($this->isMethod('post')){
            return [
                'parent_id' => 'nullable|numeric',
                'title' => 'required|min:3|max:100',
                'text' => 'required|min:3|max:10000',
            ];
        } else {
            return [];
        }
    }
}
