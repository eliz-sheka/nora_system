<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CloseVisitsRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'id.*' => ['required', 'exists:visits,id']
        ];
    }
}
