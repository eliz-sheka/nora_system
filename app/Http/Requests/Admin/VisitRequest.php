<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use App\Enums\DiscountUnits;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Request;

class VisitRequest extends FormRequest
{
    /**
     * @return \string[][]
     */
    public function rules(): array
    {
        $rules = [];
        $currentMethod = $this->method();

        if (Request::METHOD_GET === $currentMethod) {
            $rules = array_merge($rules, [
                'date' => ['nullable', 'array', 'max:2'],
                'date.from' => ['nullable', 'date', 'date_format:Y-m-d',],
                'date.to' => ['nullable', 'date', 'before: tomorrow', 'after:active_from',],
            ]);
        } elseif (Request::METHOD_POST === $currentMethod) {
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
