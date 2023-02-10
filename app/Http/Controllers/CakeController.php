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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCakeRequest  $request
     * @return \Illuminate\Http\Response
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
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Http\Response
     */
    public function show(Cake $cake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Http\Response
     */
    public function edit(Cake $cake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCakeRequest  $request
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCakeRequest $request, Cake $cake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cake  $cake
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cake $cake)
    {
        //
    }
}
