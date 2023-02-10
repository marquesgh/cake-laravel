<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Cake;
use Illuminate\Http\Request;
use App\Http\Repositories\CakeRepository;
use App\Http\Requests\StoreCakeRequest;
use App\Http\Controllers\CakeController;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class StoreCakeTest extends TestCase
{
    use WithFaker, DatabaseTransactions;

    /**
     * Setup function.
     */
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * Test store function.
     *
     * @return void
     */
    public function test_store(): void
    {
        //Set data with invalid cake_id
        $cake = Cake::factory()->make();

        //Set the controller
        $controller = new CakeController(new CakeRepository());

        //Set the request
        $request = StoreCakeRequest::create('/cakes', 'POST', $cake->toArray());

        //Call store function
        $response = $controller->store($request);

        //Assert that the database contains the object
        $this->assertDatabaseHas('cakes', $cake->toArray());
    }
}
