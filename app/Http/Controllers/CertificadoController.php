<?php

namespace App\Http\Controllers;

use App\Http\Requests\Certificado\StoreCertificadoRequest;
use App\Models\Certificado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CertificadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $bag = [
        'view' => 'admin.certificado',
        'route' => 'certificado',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Certificado $certificado)
    {
        $this->certificado = $certificado;
    }
    public function index()
    {
        $certificados = $this->certificado->get();
        return view($this->bag['view'] . '.index', compact('certificados'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->bag['view'] . '.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCertificadoRequest  $request)
    {
        DB::beginTransaction();
        try {
            $extensao = $request['img']->extension();
            $path = 'semicevento/Evento' . '/Certificado' . '';
            $nome = 'modelocertificado' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
            $dados['img'] = $request['img']->storeAs($path, $nome);
            $dados['nome'] = $request['nome'];
            $dados['descricao'] = $request['descricao'];

            $this->certificado->create($dados);
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('certificado.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function show(Certificado $certificado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificado $certificado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificado $certificado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Certificado  $certificado
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificado $certificado)
    {
        //
    }
}
