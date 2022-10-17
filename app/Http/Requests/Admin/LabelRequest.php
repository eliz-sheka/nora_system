<?php

namespace App\Http\Requests\Admin;

use App\Models\Label;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Request;

class LabelRequest extends FormRequest
{
    /**
     * @return array
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'min:2', 'max:15'],
        ];

        $currentMethod = $this->method();

        if (Request::METHOD_POST === $currentMethod) {
            $rules['name'] = array_merge($rules['name'], [Rule::unique(Label::class, 'name')]);
        } elseif (Request::METHOD_PATCH === $currentMethod) {
            $rules['name'] = array_merge(
                $rules['name'],
                [Rule::unique(Label::class, 'name')->ignore($this->route()->label)]
            );
        }

        return $rules;
    }
}
