<?php

namespace Tests;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Validation\Validator as ValidatorToReturn;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * Setup validator
     */
    protected function createValidator(array $form, FormRequest $request): ValidatorToReturn
    {
        return Validator::make($form, $request->rules());
    }
}
