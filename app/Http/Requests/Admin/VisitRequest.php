<?php

declare(strict_types=1);

namespace App\Http\Requests\Admin;

use App\Enums\PaymentMethods;
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
        } else {
            $rules = [
                'label' => ['required', 'exists:labels,id'],
                'discount' => ['nullable', 'exists:discounts,id'],
                'note' => ['nullable', 'string', 'max:500'],
                'start_time' => ['nullable', 'date',],
                'end_time' => ['nullable', 'date', 'after:active_from',],
                'is_paid' => ['nullable', 'boolean'],
                'paid_amount' => ['nullable', 'numeric'],
                'payment_method' => ['nullable', Rule::in(PaymentMethods::getValues())],
            ];

            if (Request::METHOD_POST === $currentMethod) {
                $rules = array_merge($rules, [
                    'visitors_number' => ['required', 'int', 'min:1', 'max:30'],
                ]);
            }
        }

        return $rules;
    }
}
