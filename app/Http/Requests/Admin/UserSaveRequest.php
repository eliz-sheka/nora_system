<?php

namespace App\Http\Requests\Admin;

use App\Enums\Sex;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserSaveRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'first_name' => ['nullable', 'string', 'min:2', 'max:20'],
            'middle_name' => ['nullable', 'string', 'min:2', 'max:20'],
            'last_name' => ['nullable', 'string', 'min:2', 'max:20'],
            'email' => ['nullable', 'email', 'max:30', Rule::unique(User::class, 'email')],
            'phone' => ['required', 'min:10', 'max:30', Rule::unique(User::class, 'phone')],
            'password' => ['nullable', 'confirmed', 'min:6', 'max:20'],
            'role' => ['required', 'exists:roles,slug'],
            'sex' => ['required', Rule::in(Sex::getValues())],
            'birth_date' => ['nullable', 'date_format:Y-m-d'],
        ];
    }
}
