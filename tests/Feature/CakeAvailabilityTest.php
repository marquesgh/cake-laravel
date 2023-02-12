<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Cake;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CakeAvailabilityTest extends TestCase
{
    use WithFaker, DatabaseTransactions;

    /**
     * Store test.
     *
     * @return void
     */
    public function test_store_returns_a_successful_response(): void
    {
        //Setup test
        $quantity = fake()->randomDigitNotNull();
        $cake = Cake::factory([
            'quantity' => $quantity - 1 //more users than cakes
        ])->create();

        $users = User::factory()->count($quantity)->create();
        $route = 'api/cake_availabilities/';

        $data = [
            'cake_id' => $cake->id,
            'users_id' => $users->pluck('id')->toArray()
        ];

        //Create response
        $response = $this->post(
            $route,
            $data
        );

        //Assert response
        $response->assertStatus(Response::HTTP_OK);
        $response->assertJson([
            'data' => trans('common.successful'),
        ]);

        //Assert database
        $count = 0;
        $available = true;
        foreach ($users as $user) {
            if ($count == $quantity - 1) {
                $available = false;
            }
            $this->assertDatabaseHas('cake_availabilities', [
                'available' => $available,
                'user_id' => $user->id,
                'cake_id' => $cake->id,
            ]);
            $count++;
        }
    }
}
