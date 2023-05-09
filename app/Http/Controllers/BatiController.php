<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBatiRequest;
use App\Http\Requests\UpdateBatiRequest;
use App\Models\Bati;

class BatiController extends Controller
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
     * @param  \App\Http\Requests\StoreBatiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBatiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bati  $bati
     * @return \Illuminate\Http\Response
     */
    public function show(Bati $bati)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bati  $bati
     * @return \Illuminate\Http\Response
     */
    public function edit(Bati $bati)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBatiRequest  $request
     * @param  \App\Models\Bati  $bati
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBatiRequest $request, Bati $bati)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bati  $bati
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bati $bati)
    {
        //
    }
}
