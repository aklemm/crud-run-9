<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('update', $this->route('item'));
    }

    public function rules(): array
    {
        return [
            'name' => [
                'required',
                'string',
            ],
            'description' => [
                'nullable',
                'string',
            ],
        ];
    }
}
