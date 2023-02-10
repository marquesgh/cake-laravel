<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCakeRequest;
use App\Http\Requests\UpdateCakeRequest;
use App\Models\Cake;

class CakeController extends Controller
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
     * @param  \App\Http\Requests\StoreCakeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCakeRequest $request)
    {
        return response()->json(['test' => 'test']);
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
