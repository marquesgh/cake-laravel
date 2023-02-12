<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;


class StoreCakeAvailabilityRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'users_id' => ['required', 'array'],
            'users_id.*' => ['exists:users,id'],
            'cake_id' => ['required', 'exists:cakes,id'],
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'users_id.required' => trans('validation.validation_required'),
            'users_id.array' => trans('validation.validation_array'),
            'users_id.*.exists' => trans('validation.validation_array_exists'),
            'cake_id.required' => trans('validation.validation_required'),
            'cake_id.exists' => trans('validation.validation_exists'),
        ];
    }
}
