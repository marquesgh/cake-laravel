<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Cake;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CakeTest extends TestCase
{
    /**
     * Store test.
     *
     * @return void
     */
    public function test_store_returns_a_successful_response()
    {
        //Setup test
        $cake = Cake::factory()->make();
        $route = 'api/cakes/';

        //Create response
        $response = $this->post(
            $route,
            $cake->toArray()
        );

        //Assert response
        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson([
            'data' =>
            [
                'name' => $cake->name,
                'weight' => $cake->weight,
                'value' => $cake->value,
            ],
        ]);

        //Assert database
        $this->assertDatabaseHas('cakes', [
            'id' => $response['data']['id'],
            'name' => $response['data']['name'],
            'weight' => $response['data']['weight'],
            'value' => $response['data']['value'],
        ]);
    }
}
