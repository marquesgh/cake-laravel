<?php

namespace App\Http\Requests;

use App\Models\Cake;
use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreCakeRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'cake_id' => ['exists:cakes,id'],
            'name' => ['required', 'string', 'max:' . Cake::$nameMaxLength],
            'weight' => ['required', 'numeric', 'integer', 'min:0'],
            'value' => ['required', 'numeric', 'min:0'],
            'quantity' => ['required', 'numeric', 'integer', 'min:0'],
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
            'cake_id.exists' => trans('validation.validation_exists'),
            'name.required' => trans('validation.validation_required'),
            'name.string' => trans('validation.validation_string'),
            'name.max' => trans('validation.validation_max_string'),
            'weight.required' => trans('validation.validation_required'),
            'weight.numeric' => trans('validation.validation_numeric'),
            'weight.min' => trans('validation.validation_min_number'),
            'weight.integer' => trans('validation.validation_integer'),
            'value.required' => trans('validation.validation_required'),
            'value.numeric' => trans('validation.validation_numeric'),
            'value.min' => trans('validation.validation_min_number'),
            'quantity.required' => trans('validation.validation_required'),
            'quantity.numeric' => trans('validation.validation_numeric'),
            'quantity.min' => trans('validation.validation_min_number'),
            'quantity.integer' => trans('validation.validation_integer'),
        ];
    }
}
