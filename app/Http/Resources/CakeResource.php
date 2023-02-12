<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class CakeResource
 *
 * @OA\Schema(
 *      schema="CakeResource",
 *      type="object",
 *      description="Returns cake",
 *      title="CakeResource",
 *      oneOf={
 *          @OA\Schema(
 *              schema="Cake",
 *              title="Cake",
 *              required={"data"},
 *              @OA\Property(
 *                  property="data",
 *                  format="array",
 *                  type="array",
 *                  description="Cake",
 *                  nullable=true,
 *                  @OA\Items(
 *                      type="object",
 *                      @OA\Property(
 *                          property="cake_id",
 *                          format="integer",
 *                          type="number",
 *                          description="The cake's ID",
 *                          example="1"
 *                      ),
 *                      @OA\Property(
 *                          property="name",
 *                          format="string",
 *                          type="string",
 *                          description="The name of the cake",
 *                          example="Cake 1"
 *                      ),
 *                      @OA\Property(
 *                          property="weight",
 *                          format="integer",
 *                          type="number",
 *                          description="The weight of the cake",
 *                          example="200"
 *                      ),
 *                      @OA\Property(
 *                          property="value",
 *                          format="float",
 *                          type="number",
 *                          description="The value of the cake",
 *                          example="Varejo"
 *                      ),
 *                      @OA\Property(
 *                          property="quantity",
 *                          format="integer",
 *                          type="number",
 *                          description="The available quantity",
 *                          example="250"
 *                      ),
 *                  )
 *              ),
 *         ),
 *     }
 * )
 */
class CakeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'weight' => $this->weight,
            'value' => currencyFormat($this->value),
            'quantity' => $this->quantity,
        ];
    }
}
