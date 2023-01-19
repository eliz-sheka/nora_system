<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CloseVisitsRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'id.*' => [
                'nullable',
                Rule::exists('visitors')->where(function ($query) {
                    return $query->where('visit_id', $this->get('visit'));
                }),
            ]
        ];
    }
}
