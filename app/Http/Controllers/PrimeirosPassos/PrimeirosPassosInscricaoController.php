<?php

namespace App\Http\Controllers\PrimeirosPassos;

use App\Models\SubArea;
use App\Models\GrandeArea;
use App\Models\PrimeiroPasso;
use App\Http\Controllers\Controller;
use App\Models\PrimeirosPassosInscricao;
use App\Http\Requests\PrimeirosPassos\StorePrimeirosPassosInscricaoRequest;
use App\Http\Requests\PrimeirosPassos\UpdatePrimeirosPassosInscricaoRequest;

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

    public function __construct(PrimeirosPassosInscricao $ppinscricao, GrandeArea $grandearea, SubArea $subarea, PrimeiroPasso $primeiropasso)
    {
        $this->ppinscricao = $ppinscricao;
        $this->primeiropasso = $primeiropasso;
        $this->grandearea = $grandearea;
        $this->subarea = $subarea;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('page.primeirospassos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PrimeiroPasso $primeiropasso)
    {
        $grandeArea = $this->grandearea->with('grandeArea_subArea')->get();

        return view('page.primeirospassos.create', compact('grandeArea', 'primeiropasso'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PrimeirosPassos\StorePrimeirosPassosInscricaoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrimeirosPassosInscricaoRequest $request)
    {
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
