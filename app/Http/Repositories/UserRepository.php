<?php

namespace App\Http\Repositories;

use App\Models\User;

class UserRepository
{
    /**
     * Get a user by id
     *
     * @param int $id
     * @return User
     */
    public function getById(int $id): User
    {
        return User::findOrFail($id);
    }
}
