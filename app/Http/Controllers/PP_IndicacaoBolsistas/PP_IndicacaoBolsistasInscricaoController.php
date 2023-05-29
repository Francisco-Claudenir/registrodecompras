<?php

namespace App\Http\Controllers\PP_IndicacaoBolsistas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PP_IndicacaoBolsistas\StorePP_IndicacaoBolsistasInscricaoRequest;
use App\Models\PP_IndicacaoBolsistas;
use App\Models\PP_IndicacaoBolsistasInscricao;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PP_IndicacaoBolsistasInscricaoController extends Controller
{
    protected $pp_indicacao_bolsistas;
    protected $pp_i_bolsistas_inscricao;
    protected $bag = [
        'view' => 'page.pp_indicacao_bolsistas',
        'route' => 'pp-i-bolsistas-inscricao',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(PP_IndicacaoBolsistas $pp_indicacao_bolsistas, PP_IndicacaoBolsistasInscricao $pp_i_bolsistas_inscricao)
    {
        $this->pp_indicacao_bolsistas = $pp_indicacao_bolsistas;
        $this->pp_i_bolsistas_inscricao = $pp_i_bolsistas_inscricao;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($pp_indicacao_bolsista_id)
    {
        $listaInscritos = $this->pp_i_bolsistas_inscricao
                               ->join('users','users.id', '=', 'pp_indicacao_bolsistas_inscricao.user_id')
                               ->where('pp_indicacao_bolsistas_inscricao.pp_i_bolsista_id', '=', $pp_indicacao_bolsista_id)
                               ->select([
                                'users.nome',
                                'users.email',
                                'users.cpf',
                                'users.telefone',
                                'pp_indicacao_bolsistas_inscricao.pp_i_bolsista_inscricao_id'
                                ])->get();
        
        return view($this->bag['view'] . '.index', compact('listaInscritos')); 
    }

    public function espelho($pp_i_bolsista_inscricao_id)
    {
        $dadosInscritos = $this->pp_i_bolsistas_inscricao->findOrfail($pp_i_bolsista_inscricao_id);
        return view($this->bag['view'] . '.espelho', compact('dadosInscritos')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($pp_indicacao_bolsista_id)
    {
        $pp_indicacao_bolsista = $this->pp_indicacao_bolsistas->findOrfail($pp_indicacao_bolsista_id);
        return view($this->bag['view'] . '.create', compact('pp_indicacao_bolsista'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePP_IndicacaoBolsistasInscricaoRequest $request, $pp_indicacao_bolsista_id)
    {
        try {
            DB::beginTransaction();
            //variavel para adicionar os ids
            $ids = [];

            //Buscando e adcionando os id de pp_indicacao_bolsista_id e id so user a variavel
            $ids['pp_i_bolsista_id'] = $pp_indicacao_bolsista_id;
            $ids['user_id'] = Auth::user()->id;

            //combina as duas arrays $request e $ids na variavel %dados_inscricao
            $dados_inscricao = array_merge($ids, $request->all());

            $this->pp_i_bolsistas_inscricao->create($dados_inscricao);    
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.inscricao'));
            return redirect()->route('pp-i-bolsistas.page', ['pp_indicacao_bolsista_id' => $pp_indicacao_bolsista_id]);
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.inscricao'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
