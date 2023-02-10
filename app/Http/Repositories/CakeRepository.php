<?php

namespace App\Http\Repositories;

use App\Models\Cake;

class CakeRepository
{
    /**
     * Create a new cake
     *
     * @param array $attributes
     * @return Cake
     */
    public function create(array $attributes): Cake
    {
        return Cake::create($attributes);
    }

    /**
     * Get a cake by id
     *
     * @param int $id
     * @return Cake
     */
    public function getById(int $id): Cake
    {
        return Cake::findOrFail($id);
    }

    /**
     * Update a cake
     *
     * @param int $id
     * @param array $attributes
     * @return Cake
     */
    public function update(int $id, array $attributes): Cake
    {
        $cake = Cake::findOrFail($id);
        $cake->update($attributes);
        return $cake;
    }

    /**
     * Delete a cake
     *
     * @param int $id
     * @return bool
     */
    public function delete(int $id): bool
    {
        $cake = Cake::findOrFail($id);
        return $cake->delete();
    }
}
