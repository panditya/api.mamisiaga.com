<?php

namespace App\Http\Requests\Admin\ImmunizationStandard;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'age_in_months' => ['required', 'number', 'min:0'],
        ];
    }
}
