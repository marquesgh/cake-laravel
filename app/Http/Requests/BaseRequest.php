<?php

namespace App\Http\Requests;

use Illuminate\Http\Response;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class BaseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * In case validation fails, return message.
     *
     * @throws HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        // catch error messages
        $error_messages = $validator->errors()->all();
        throw new HttpResponseException(
            response()->json(
                [
                    'error' => $error_messages,
                ],
                Response::HTTP_BAD_REQUEST
            )
        );
    }
}
