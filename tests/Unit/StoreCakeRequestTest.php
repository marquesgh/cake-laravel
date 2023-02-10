<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Cake;
use App\Http\Requests\StoreCakeRequest;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreCakeRequestTest extends TestCase
{
    use WithFaker, DatabaseTransactions;
    protected $formRequest;

    /**
     * Setup function.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->formRequest = new StoreCakeRequest();
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
            'attribute' => 'name'
        ]), $validator->messages()->first('name'));
        $this->assertEquals(trans('validation.validation_required', [
            'attribute' => 'weight'
        ]), $validator->messages()->first('weight'));
        $this->assertEquals(trans('validation.validation_required', [
            'attribute' => 'value'
        ]), $validator->messages()->first('value'));
    }

    /**
     * Test max validation.
     *
     * @return void
     */
    public function test_max_validation(): void
    {
        //Set data with wrong name length
        $cake = Cake::factory(
            [
                'name' => fake()->regexify('[A-Z]{' . Cake::$nameMaxLength + 1 . '}')
            ]
        )->make();

        //Setup validator
        $validator = $this->createValidator($cake->toArray(), $this->formRequest);

        //Assert that the request instance has errors
        $this->assertTrue($validator->fails());

        // Assert that the errors contain the correct messages
        $this->assertEquals(trans('validation.validation_max_string', [
            'attribute' => 'name',
            'max' => Cake::$nameMaxLength
        ]), $validator->messages()->first('name'));
    }

    /**
     * Test numeric validation.
     *
     * @return void
     */
    public function test_numeric_validation(): void
    {
        //Set data with invalid weight and value
        $cake = Cake::factory(
            [
                'weight' => '10,5',
                'value' => '10,5'
            ]
        )->make();

        //Setup validator
        $validator = $this->createValidator($cake->toArray(), $this->formRequest);

        //Assert that the request instance has errors
        $this->assertTrue($validator->fails());

        // Assert that the errors contain the correct messages
        $this->assertEquals(trans('validation.validation_numeric', [
            'attribute' => 'weight'
        ]), $validator->messages()->first('weight'));
        $this->assertEquals(trans('validation.validation_numeric', [
            'attribute' => 'value'
        ]), $validator->messages()->first('value'));
    }

    /**
     * Test min validation.
     *
     * @return void
     */
    public function test_min_validation(): void
    {
        //Set data with invalid weight and value
        $cake = Cake::factory(
            [
                'weight' => -1,
                'value' => -1
            ]
        )->make();

        //Setup validator
        $validator = $this->createValidator($cake->toArray(), $this->formRequest);

        //Assert that the request instance has errors
        $this->assertTrue($validator->fails());

        // Assert that the errors contain the correct messages
        $this->assertEquals(trans('validation.validation_min_number', [
            'attribute' => 'weight',
            'min' => 0
        ]), $validator->messages()->first('weight'));
        $this->assertEquals(trans('validation.validation_min_number', [
            'attribute' => 'value',
            'min' => 0
        ]), $validator->messages()->first('value'));
    }

    /**
     * Test integer validation.
     *
     * @return void
     */
    public function test_integer_validation(): void
    {
        //Set data with invalid weight
        $cake = Cake::factory(
            [
                'weight' => fake()->randomFloat(2, 0, 100),
            ]
        )->make();

        //Setup validator
        $validator = $this->createValidator($cake->toArray(), $this->formRequest);

        //Assert that the request instance has errors
        $this->assertTrue($validator->fails());

        // Assert that the errors contain the correct messages
        $this->assertEquals(trans('validation.validation_integer', [
            'attribute' => 'weight',
        ]), $validator->messages()->first('weight'));
    }
}
