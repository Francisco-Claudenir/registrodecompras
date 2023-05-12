<?php

namespace App\Http\Controllers\PrimeirosPassos;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrimeirosPassos\UpdatePrimeirosPassosInscricaoRequest;
use App\Http\Requests\PrimeirosPassos\StorePrimeirosPassosInscricaoRequest;
use App\Models\PrimeirosPassosInscricao;

class PrimeirosPassosInscricaoController extends Controller
{
    protected $primeirospassosinscricao;
    protected $bag = [
        'view' => '',
        'route' => '',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(PrimeirosPassosInscricao $ppinscricao)
    {
        $this->ppinscricao = $ppinscricao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teste');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PrimeirosPassos\StorePrimeirosPassosInscricaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrimeirosPassosInscricaoRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrimeirosPassosInscricao  $primeirosPassosInscricao
     * @return \Illuminate\Http\Response
     */
    public function show(PrimeirosPassosInscricao $primeirosPassosInscricao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrimeirosPassosInscricao  $primeirosPassosInscricao
     * @return \Illuminate\Http\Response
     */
    public function edit(PrimeirosPassosInscricao $primeirosPassosInscricao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PrimeirosPassos\UpdatePrimeirosPassosInscricaoRequest  $request
     * @param  \App\Models\PrimeirosPassosInscricao  $primeirosPassosInscricao
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrimeirosPassosInscricaoRequest $request, PrimeirosPassosInscricao $primeirosPassosInscricao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrimeirosPassosInscricao  $primeirosPassosInscricao
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrimeirosPassosInscricao $primeirosPassosInscricao)
    {
        //
    }
}
