<?php

namespace App\Http\Requests\Admin\Children;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'place_of_birth' => ['required', 'string', 'max:255'],
            'date_of_birth' => ['required', 'date'],
            'sex' => ['required'],
            'blood_type' => ['required']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'mother_id' => Auth::user()->profile_id
        ]);
    }
}
