<?php

namespace App\Http\Requests\Admin;

use App\Models\VisitType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Request;

class VisitTypeRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'description' => ['required', 'string', 'min:2', 'max:15'],
            'price' => ['required', 'integer',  'min:1', 'max:2000'],
        ];

        $currentMethod = $this->method();

        if (Request::METHOD_POST === $currentMethod) {
            $rules['description'] = array_merge($rules['description'], [Rule::unique(VisitType::class, 'description')]);
        } elseif (Request::METHOD_PATCH === $currentMethod) {
            $rules['description'] = array_merge(
                $rules['description'],
                [Rule::unique(VisitType::class, 'description')->ignore($this->route()->visitType)]
            );
        }

        return $rules;
    }
}
