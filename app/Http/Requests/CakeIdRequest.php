<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Support\Facades\Route;

class CakeIdRequest extends BaseRequest
{
    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation(): void
    {
        $this->merge([
            'cake_id' => Route::getCurrentRoute()->cake_id,
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
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
            'cake_id.required' => trans('validation.validation_required'),
            'cake_id.exists' => trans('validation.validation_exists'),
        ];
    }
}
