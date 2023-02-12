<?php

namespace App\Http\Repositories;

use App\Models\CakeAvailability;
use App\Events\CakeAvailabilityCreated;
use App\Http\Repositories\CakeRepository;
use App\Http\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;

class CakeAvailabilityRepository
{
    /**
     * Create a new cake
     *
     * @param array $attributes
     * @return CakeAvailability
     */
    public function create(array $attributes): void
    {
        $cakeRepository = new CakeRepository();

        $countUsers = count($attributes['users_id']);

        $cake = $cakeRepository->getById($attributes['cake_id']);
        $quantity = $cake->quantity;

        $cake->quantity = $quantity > $countUsers ? $quantity - $countUsers : 0;
        $cake->save();

        foreach ($attributes['users_id'] as $userId) {
            $cakeAvailability = new CakeAvailability();
            $cakeAvailability->cake_id = $cake->id;
            $cakeAvailability->user_id = $userId;
            if ($quantity > 0) {
                $cakeAvailability->available = true;
                $quantity--;
                event(new CakeAvailabilityCreated($cakeAvailability));
            } else {
                $cakeAvailability->available = false;
            }
            $cakeAvailability->save();
        }
    }
}
