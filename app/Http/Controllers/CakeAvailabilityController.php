<?php

namespace App\Http\Controllers;

use App\Models\CakeAvailability;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCakeAvailabilityRequest;
use App\Http\Requests\UpdateCakeAvailabilityRequest;
use App\Http\Repositories\CakeAvailabilityRepository;

class CakeAvailabilityController extends Controller
{
    /**
     * @var CakeAvailabilityRepository
     */
    private $cakeAvailabilityRepository;

    /**
     * CakeController constructor.
     *
     * @param CakeAvailabilityRepository $cakeAvailabilityRepository
     */
    public function __construct(CakeAvailabilityRepository $cakeAvailabilityRepository)
    {
        $this->cakeAvailabilityRepository = $cakeAvailabilityRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *      path="/cake_availabilities",
     *      tags={"Cake Availabilities"},
     *      summary="Create a new availability",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *               @OA\Schema(
     *                  schema="Cake",
     *                  type="object",
     *                  title="Cake Model",
     *                  required={"users_id", "cake_id"},
     *                  @OA\Property(
     *                      property="users_id",
     *                      type="array",
     *                      description="A list of users IDs",
     *                      example="[1, 2, 3]",
     *                      @OA\Items(type="integer")
     *                  ),
     *                  @OA\Property(
     *                      property="cake_id",
     *                      type="integer",
     *                      example="1",
     *                      description="Cake ID"
     *                  ),
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation"
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad Request"
     *      ),
     *      @OA\Response(
     *          response=500,
     *          description="Internal server error"
     *      ),
     * )
     *
     * @param  StoreCakeAvailabilityRequest  $request
     * @return Response
     * @throws Throwable
     */
    public function store(StoreCakeAvailabilityRequest $request)
    {
        try {
            $this->cakeAvailabilityRepository->create($request->all());
            $response = trans('common.successful');
            return $this->sendServerResponse($response);
        } catch (Throwable $exception) {
            return $this->sendServerError($exception, __CLASS__, __FUNCTION__);
        }
    }
}
