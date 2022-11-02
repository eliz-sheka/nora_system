<?php

namespace App\Http\Requests\Admin;

use App\Enums\DiscountUnits;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Request;

class DiscountRequest extends FormRequest
{
    /**
     * @return \string[][]
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'min:2', 'max:30'],
            'description' => ['nullable', 'string', 'min:2', 'max:255'],
        ];

        $currentMethod = $this->method();

        // @TODO Add OR has permission to edit discount details
        if (Request::METHOD_POST === $currentMethod) {
            $rules= array_merge($rules, [
                'amount' => ['required', 'int', 'min:1',],
                'unit' => ['required', 'string', Rule::in(DiscountUnits::getValues())],
                'quantity' => ['nullable', 'int', 'min:1', 'max:1000'],
                'active_from' => ['nullable', 'date', 'date_format:Y-m-d',],
                'active_till' => ['nullable', 'date', 'after:yesterday', 'after:active_from', 'date_format:Y-m-d',],
            ]);
        }

        return $rules;
    }
}
