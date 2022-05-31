<?php

namespace App\Http\Requests\Admin\ChildrenBodyMassIndex;

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
            'age_in_months' => ['required', 'integer', 'min:0'],
            'height_in_cm' => ['required', 'integer', 'min:0'],
            'weight_in_kg' => ['required', 'integer', 'min:0'],
            'head_circumference_in_cm' => ['required', 'integer', 'min:0'],
        ];
    }
}
