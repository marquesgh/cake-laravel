<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Cake;
use App\Http\Requests\CakeIdRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CakeIdRequestTest extends TestCase
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
        $this->formRequest = new CakeIdRequest();
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
            'attribute' => 'cake'
        ]), $validator->messages()->first('cake_id'));
    }

    /**
     * Test exists validation.
     *
     * @return void
     */
    public function test_exists_validation(): void
    {
        //Set data with invalid cake_id
        $cake = Cake::factory(
            [
                'cake_id' => 0
            ]
        )->make();

        //Setup validator
        $validator = $this->createValidator($cake->toArray(), $this->formRequest);

        //Assert that the request instance has errors
        $this->assertTrue($validator->fails());

        // Assert that the errors contain the correct messages
        $this->assertEquals(trans('validation.validation_exists', [
            'attribute' => 'cake'
        ]), $validator->messages()->first('cake_id'));
    }

    /**
     * Test validation with success.
     *
     * @return void
     */
    public function test_success_validation(): void
    {
        //Set data with invalid cake_id
        $cake = Cake::factory()->create();

        //Setup validator
        $validator = $this->createValidator([
            'cake_id' => $cake->id
        ], $this->formRequest);

        //Assert that the request instance hasn't errors
        $this->assertFalse($validator->fails());
    }
}
