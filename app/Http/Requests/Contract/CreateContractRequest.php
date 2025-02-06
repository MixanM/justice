<?php

namespace App\Http\Requests\Contract;

use Illuminate\Foundation\Http\FormRequest;

class CreateContractRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
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
            'end_date' => 'datetime|required',
        ];
    }
}
