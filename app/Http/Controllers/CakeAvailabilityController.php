<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCakeAvailabilityRequest;
use App\Http\Requests\UpdateCakeAvailabilityRequest;
use App\Models\CakeAvailability;

class CakeAvailabilityController extends Controller
{
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCakeAvailabilityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCakeAvailabilityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CakeAvailability  $cakeAvailability
     * @return \Illuminate\Http\Response
     */
    public function show(CakeAvailability $cakeAvailability)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CakeAvailability  $cakeAvailability
     * @return \Illuminate\Http\Response
     */
    public function edit(CakeAvailability $cakeAvailability)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCakeAvailabilityRequest  $request
     * @param  \App\Models\CakeAvailability  $cakeAvailability
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCakeAvailabilityRequest $request, CakeAvailability $cakeAvailability)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CakeAvailability  $cakeAvailability
     * @return \Illuminate\Http\Response
     */
    public function destroy(CakeAvailability $cakeAvailability)
    {
        //
    }
}
