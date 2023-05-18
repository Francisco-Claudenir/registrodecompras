<?php

namespace App\Http\Controllers\PP_IndicacaoBolsistas;

use App\Http\Controllers\Controller;
use App\Http\Requests\PP_IndicacaoBolsistas\StorePP_IndicacaoBolsistasRequest;
use App\Http\Requests\PP_IndicacaoBolsistas\UpdatePP_IndicacaoBolsistasRequest;
use App\Models\PP_IndicacaoBolsistas;
use Illuminate\Support\Facades\DB;

class PP_IndicacaoBolsistasController extends Controller
{
    protected $pp_indicacao_bolsistas;
    protected $bag = [
        'view' => 'admin.pp_indicacao_bolsistas',
        'route' => 'pp-indicacao-bolsistas',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(PP_IndicacaoBolsistas $pp_indicacao_bolsistas)
    {
        $this->pp_indicacao_bolsistas = $pp_indicacao_bolsistas;
    }

    public function index()
    {
        $pp_indicacao_bolsistas = $this->pp_indicacao_bolsistas->paginate(20);
        return view($this->bag['view'] . '.index', compact('pp_indicacao_bolsistas'));
    }

    public function create()
    {
        return view($this->bag['view'] . '.create');
    }

    public function store(StorePP_IndicacaoBolsistasRequest $request)
    {
        try {
            DB::beginTransaction();
            $dados = $request->validated();
            $dados['data_fim'] = $dados['data_fim'] . ' 23:59:59';
            $dados['status'] = 'Aberto';

            $this->pp_indicacao_bolsistas->create($dados);
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route($this->bag['route'] . '.index');
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $pp_indicacao_bolsistas = $this->pp_indicacao_bolsistas->findOrfail($id);
        return view($this->bag['view'] . '.edit', compact('pp_indicacao_bolsistas'));
    }


    public function update(UpdatePP_IndicacaoBolsistasRequest $request, $id)
    {
        try {
            
            DB::beginTransaction();
            $primeiropasso = $this->pp_indicacao_bolsistas->findOrfail($id);
            $dados = $request->validated();
            $dados['data_fim'] = $dados['data_fim'] . ' 23:59:59';
            $primeiropasso->update($dados);

            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.update'));
            return redirect()->route($this->bag['route'] . '.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.update'));
            return redirect()->back();
        }
    }
}
