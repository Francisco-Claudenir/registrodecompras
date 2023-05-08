<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanoTrabalhoRequest;
use App\Http\Requests\UpdatePlanoTrabalhoRequest;
use App\Models\PlanoTrabalho;

class PlanoTrabalhoController extends Controller
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
     * @param  \App\Http\Requests\StorePlanoTrabalhoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanoTrabalhoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlanoTrabalho  $planoTrabalho
     * @return \Illuminate\Http\Response
     */
    public function show(PlanoTrabalho $planoTrabalho)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlanoTrabalho  $planoTrabalho
     * @return \Illuminate\Http\Response
     */
    public function edit(PlanoTrabalho $planoTrabalho)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlanoTrabalhoRequest  $request
     * @param  \App\Models\PlanoTrabalho  $planoTrabalho
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlanoTrabalhoRequest $request, PlanoTrabalho $planoTrabalho)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlanoTrabalho  $planoTrabalho
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlanoTrabalho $planoTrabalho)
    {
        //
    }
}
