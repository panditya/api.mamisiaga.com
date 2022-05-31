<?php

namespace App\Http\Requests\Admin\ImmunizationStandard;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }

    public function rules(): array
    {
        return [
            'age_in_months' => ['required', 'number', 'min:0'],
        ];
    }
}
