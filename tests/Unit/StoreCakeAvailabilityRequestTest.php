<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use App\Http\Requests\StoreCakeAvailabilityRequest;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreCakeAvailabilityRequestTest extends TestCase
{
    use WithFaker, DatabaseTransactions;

    /**
     * @var
     */
    protected $formRequest;

    /**
     * Setup function.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->formRequest = new StoreCakeAvailabilityRequest();
    }

    /**
     * Test required validation.
     *
     * @return void
     */
    public function test_required_validation(): void
    {
        //Setup validator
        $validator = $this->createValidator([], $this->formRequest);

        //Assert that the request instance has errors
        $this->assertTrue($validator->fails());

        // Assert that the errors contain the correct messages
        $this->assertEquals(trans('validation.validation_required', [
            'attribute' => trans('validation.attributes.users_id')
        ]), $validator->messages()->first('users_id'));
        $this->assertEquals(trans('validation.validation_required', [
            'attribute' => trans('validation.attributes.cake_id')
        ]), $validator->messages()->first('cake_id'));
    }

    /**
     * Test array validation.
     *
     * @return void
     */
    public function test_array_validation(): void
    {
        //Setup validator
        $validator = $this->createValidator([
            'users_id' => 0
        ], $this->formRequest);

        //Assert that the request instance has errors
        $this->assertTrue($validator->fails());

        // Assert that the errors contain the correct messages
        $this->assertEquals(trans('validation.validation_array', [
            'attribute' => trans('validation.attributes.users_id')
        ]), $validator->messages()->first('users_id'));
    }

    /**
     * Test exists validation.
     *
     * @return void
     */
    public function test_exists_validation(): void
    {
        //Setup validator
        $validator = $this->createValidator([
            'users_id' => [0],
            'cake_id' => 0
        ], $this->formRequest);

        //Assert that the request instance has errors
        $this->assertTrue($validator->fails());

        // Assert that the errors contain the correct messages
        $this->assertArrayHasKey('users_id.0', $validator->errors()->toArray());
        $this->assertEquals(trans('validation.validation_exists', [
            'attribute' => trans('validation.attributes.cake_id')
        ]), $validator->messages()->first('cake_id'));
    }
}
