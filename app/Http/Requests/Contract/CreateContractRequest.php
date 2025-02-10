<?php

namespace App\Http\Requests\Contract;

use Illuminate\Foundation\Http\FormRequest;

class CreateContractRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return array
     */
    public function rules(): array
    {
        return [
            'user_id' => 'integer|required',
            'customer_id' => 'integer|required',
            'executor_id' => 'integer|nullable|sometimes',
            'comment' => 'string|nullable|sometimes',
            'price' => 'integer|required',
            'city_id' => 'integer|required',
            'end_date' => 'date|required',
        ];
    }
}
