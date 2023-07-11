<?php

namespace App\Http\Controllers;

use App\Models\PibicIndicacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PibicIndicacaoController extends Controller
{

    protected $pibicIndicacao;
    protected $bag = [
        'view' => 'admin.pibic',
        'route' => 'pibic',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(PibicIndicacao $pibicIndicacao)
    {
        $this->pibicIndicacao = $pibicIndicacao;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pibicIndicacao = $this->pibicIndicacao->paginate(20);
        $pibic = $this->pibicIndicacao->where('tipo', 'Pibic')->paginate(20);
        $acoes = $this->pibicIndicacao->where('tipo', 'Ações Afirmativas')->paginate(20);
        $cnpq = $this->pibicIndicacao->where('tipo', 'Cnpq')->paginate(20);
        $fapema = $this->pibicIndicacao->where('tipo', 'Fapema')->paginate(20);
        $pivic = $this->pibicIndicacao->where('tipo', 'Pivic')->paginate(20);


        return view($this->bag['view'] . '.index', compact('pibicIndicacao', 'pibic', 'acoes', 'cnpq', 'fapema', 'pivic'));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view($this->bag['view'] . '.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $dados = $request->all();
            $dados['data_fim'] = $dados['data_fim'] . ' 23:59:59';
            $dados['status'] = 'Aberto';
            $this->pibicIndicacao->create($dados);

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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PibicIndicacao  $pibic
     * @return \Illuminate\Http\Response
     */
    public function show(PibicIndicacao $pibic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PibicIndicacao  $pibicinscricao
     * @return \Illuminate\Http\Response
     */
    public function edit(PibicIndicacao $pibic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pibic  $pibic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PibicIndicacao $pibic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PibicIndicacao  $pibic
     * @return \Illuminate\Http\Response
     */
    public function destroy(PibicIndicacao $pibic)
    {
        //
    }
}
