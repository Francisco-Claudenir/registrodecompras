<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBatiInscricaoRequest;
use App\Http\Requests\UpdateBatiInscricaoRequest;
use App\Models\BatiInscricao;

class BatiInscricaoController extends Controller
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
     * @param  \App\Http\Requests\StoreBatiInscricaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBatiInscricaoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BatiInscricao  $batiInscricao
     * @return \Illuminate\Http\Response
     */
    public function show(BatiInscricao $batiInscricao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BatiInscricao  $batiInscricao
     * @return \Illuminate\Http\Response
     */
    public function edit(BatiInscricao $batiInscricao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBatiInscricaoRequest  $request
     * @param  \App\Models\BatiInscricao  $batiInscricao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBatiInscricaoRequest $request, BatiInscricao $batiInscricao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BatiInscricao  $batiInscricao
     * @return \Illuminate\Http\Response
     */
    public function destroy(BatiInscricao $batiInscricao)
    {
        //
    }
}
