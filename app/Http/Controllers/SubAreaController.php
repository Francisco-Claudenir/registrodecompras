<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubAreaRequest;
use App\Http\Requests\UpdateSubAreaRequest;
use App\Models\SubArea;

class SubAreaController extends Controller
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
     * @param  \App\Http\Requests\StoreSubAreaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubAreaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubArea  $subArea
     * @return \Illuminate\Http\Response
     */
    public function show(SubArea $subArea)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubArea  $subArea
     * @return \Illuminate\Http\Response
     */
    public function edit(SubArea $subArea)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubAreaRequest  $request
     * @param  \App\Models\SubArea  $subArea
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSubAreaRequest $request, SubArea $subArea)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubArea  $subArea
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubArea $subArea)
    {
        //
    }
}
