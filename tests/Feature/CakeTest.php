<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Cake;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CakeTest extends TestCase
{
    use WithFaker, DatabaseTransactions;

    /**
     * Index test.
     *
     * @return void
     */
    public function test_index_returns_a_successful_response(): void
    {
        //Setup test
        $route = 'api/cakes';
        $quantity = 2;
        $cakes = Cake::factory()->count($quantity)->create();

        //Create response
        $response = $this->get(
            $route,
            []
        );

        //Assert response
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJsonCount($quantity, 'data');
        $response->assertJson([
            'data' => [
                [
                    'id' => $cakes[0]->id,
                    'name' => $cakes[0]->name,
                    'weight' => $cakes[0]->weight,
                    'value' => currencyFormat($cakes[0]->value),
                    'quantity' => $cakes[0]->quantity,
                ],
                [
                    'id' => $cakes[1]->id,
                    'name' => $cakes[1]->name,
                    'weight' => $cakes[1]->weight,
                    'value' => currencyFormat($cakes[1]->value),
                    'quantity' => $cakes[1]->quantity
                ]
            ],
        ]);
    }

    /**
     * Store test.
     *
     * @return void
     */
    public function test_store_returns_a_successful_response(): void
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
                'value' => currencyFormat($cake->value),
                'quantity' => $cake->quantity,
            ],
        ]);

        //Assert database
        $this->assertDatabaseHas('cakes', [
            'id' => $response['data']['id'],
            'name' => $cake->name,
            'weight' => $cake->weight,
            'value' => $cake->value,
            'quantity' => $cake->quantity,
        ]);
    }

    /**
     * Show test.
     *
     * @return void
     */
    public function test_show_returns_a_successful_response(): void
    {
        //Setup test
        $cake = Cake::factory()->create();
        $route = 'api/cakes/' . $cake->id;

        //Create response
        $response = $this->get(
            $route,
            []
        );

        //Assert response
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'data' => [
                'id' => $cake->id,
                'name' => $cake->name,
                'weight' => $cake->weight,
                'value' => currencyFormat($cake->value),
                'quantity' => $cake->quantity,
            ],
        ]);
    }

    /**
     * Update test.
     *
     * @return void
     */
    public function test_update_returns_a_successful_response(): void
    {
        //Setup test
        $cake = Cake::factory()->create();
        $route = 'api/cakes/' . $cake->id;
        $data = Cake::factory()->make();

        //Create response
        $response = $this->put(
            $route,
            $data->toArray()
        );

        //Assert response
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'data' =>
            [
                'id' => $cake->id,
                'name' => $data->name,
                'weight' => $data->weight,
                'value' => currencyFormat($data->value),
                'quantity' => $data->quantity,
            ],
        ]);
        $this->assertDatabaseHas('cakes', [
            'id' => $cake->id,
            'name' => $data->name,
            'weight' => $data->weight,
            'value' => $data->value,
            'quantity' => $data->quantity,
        ]);
    }

    /**
     * Destroy test.
     *
     * @return void
     */
    public function test_destroy_returns_a_successful_response(): void
    {
        //Setup test
        $cake = Cake::factory()->create();
        $route = 'api/cakes/' . $cake->id;

        //Create response
        $response = $this->delete(
            $route,
            []
        );

        //Assert response
        $response->assertStatus(Response::HTTP_NO_CONTENT);
        $this->assertDatabaseMissing('cakes', [
            'id' => $cake->id,
        ]);
    }
}
