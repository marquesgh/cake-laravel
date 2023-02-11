<?php

namespace App\Http\Controllers;

use App\Models\Cake;
use App\Http\Controllers\Controller;
use App\Http\Resources\CakeResource;
use App\Http\Repositories\CakeRepository;
use App\Http\Requests\StoreCakeRequest;
use App\Http\Requests\UpdateCakeRequest;

class CakeController extends Controller
{
    /**
     * @var CakeRepository
     */
    private $cakeRepository;

    /**
     * CakeController constructor.
     *
     * @param CakeRepository $cakeRepository
     */
    public function __construct(CakeRepository $cakeRepository)
    {
        $this->cakeRepository = $cakeRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @OA\Get(
     *      path="/cakes",
     *      tags={"Cakes"},
     *      summary="Get list of all cakes",
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CakeResource")
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
     * @return CakeResource
     * @throws Throwable
     */
    public function index()
    {
        try {
            $cakes = $this->cakeRepository->getAll();
            return CakeResource::collection($cakes);
        } catch (Throwable $exception) {
            return $this->sendServerError($exception, __CLASS__, __FUNCTION__);
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @OA\Post(
     *      path="/cakes",
     *      tags={"Cakes"},
     *      summary="Create a new cake",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *               @OA\Schema(
     *                  schema="Cake",
     *                  type="object",
     *                  title="Cake Model",
     *                  required={"name", "weight", "value", "quantity"},
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Name of the cake"
     *                  ),
     *                  @OA\Property(
     *                      property="weight",
     *                      type="integer",
     *                      description="Weight of the cake in grammes"
     *                  ),
     *                  @OA\Property(
     *                      property="value",
     *                      type="number",
     *                      format="double",
     *                      description="Value of the cake in monetary units"
     *                  ),
     *                  @OA\Property(
     *                      property="quantity",
     *                      type="number",
     *                      format="integer",
     *                      description="The available quantity"
     *                  )
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CakeResource")
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
     * @param StoreCakeRequest
     * @return CakeResource
     * @throws Throwable
     */
    public function store(StoreCakeRequest $request)
    {
        try {
            $cake = $this->cakeRepository->create($request->all());
            return new CakeResource($cake);
        } catch (Throwable $exception) {
            return $this->sendServerError($exception, __CLASS__, __FUNCTION__);
        }
    }

    /**
     * Display the specified resource.
     *
     * @OA\Get(
     *      path="/cakes/{id}",
     *      operationId="getCake",
     *      tags={"Cakes"},
     *      summary="Get a cake",
     *      description="Gets a cake by ID",
     *      @OA\Parameter(
     *          name="id",
     *          description="Cake id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CakeResource")
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
     * @param CakeIdRequest
     * @return CakeResource
     * @throws Throwable
     */
    public function show(Cake $cake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @OA\Put(
     *      path="/cakes",
     *      operationId="updateCake",
     *      tags={"Cakes"},
     *      summary="Update a cake",
     *      description="Returns updated cake data",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="application/json",
     *               @OA\Schema(
     *                  schema="Cake",
     *                  type="object",
     *                  title="Cake Model",
     *                  required={"id", "name", "weight", "value", "quantity"},
     *                  @OA\Property(
     *                      property="id",
     *                      type="number",
     *                      description="ID of the cake"
     *                  ),
     *                  @OA\Property(
     *                      property="name",
     *                      type="string",
     *                      description="Name of the cake"
     *                  ),
     *                  @OA\Property(
     *                      property="weight",
     *                      type="integer",
     *                      description="Weight of the cake in grammes"
     *                  ),
     *                  @OA\Property(
     *                      property="value",
     *                      type="number",
     *                      format="double",
     *                      description="Value of the cake in monetary units"
     *                  ),
     *                  @OA\Property(
     *                      property="quantity",
     *                      type="number",
     *                      format="integer",
     *                      description="The available quantity"
     *                  )
     *              )
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/CakeResource")
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
     * @param StoreCakeRequest
     * @return CakeResource
     * @throws Throwable
     */
    public function update(StoreCakeRequest $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @OA\Delete(
     *      path="/cakes/{id}",
     *      operationId="deleteCake",
     *      tags={"Cakes"},
     *      summary="Delete a cake",
     *      description="Deletes a cake by ID",
     *      @OA\Parameter(
     *          name="id",
     *          description="Cake id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
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
     * @param CakeIdRequest
     * @return CakeResource
     * @throws Throwable
     */
    public function destroy(Cake $cake)
    {
        //
    }
}
