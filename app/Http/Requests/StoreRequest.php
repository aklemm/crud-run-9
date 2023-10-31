<?php

namespace App\Http\Requests;

use App\Models\Item;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', Item::class);
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
