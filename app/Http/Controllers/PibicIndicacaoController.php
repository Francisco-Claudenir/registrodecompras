<?php

namespace App\Http\Controllers;

use App\Models\PibicIndicacao;
use App\Models\PibicIndicacaoInscricao;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class PibicIndicacaoController extends Controller
{

    protected $pibicIndicacao, $pibicIndicacaoInscricao;
    protected $bag = [
        'view' => 'admin.pibic',
        'route' => 'pibic-indicacao',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(PibicIndicacao $pibicIndicacao, PibicIndicacaoInscricao $pibicIndicacaoInscricao)
    {
        $this->pibicIndicacao = $pibicIndicacao;
        $this->pibicIndicacaoInscricao = $pibicIndicacaoInscricao;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pibicIndicacao = $this->pibicIndicacao->withCount('pibicIndicacao_Inscricao')->paginate(20);
//        foreach ($pibicIndicacao as $item){
//
//        dd($item['caminhoBanner'] =$pibicIndicacao );
//        }

        $pibic = $this->pibicIndicacao->where('tipo', 'Pibic')->paginate(20);
        $acoes = $this->pibicIndicacao->where('tipo', 'Ações Afirmativas')->paginate(20);
        $cnpq = $this->pibicIndicacao->where('tipo', 'Cnpq')->paginate(20);
        $fapema = $this->pibicIndicacao->where('tipo', 'Fapema')->paginate(20);
        $pivic = $this->pibicIndicacao->where('tipo', 'Pivic')->paginate(20);
        return view($this->bag['view'] . '.index', compact('pibicIndicacao', 'pibic', 'acoes', 'cnpq', 'fapema', 'pivic'));

    }

    //Index para User
    public function site()
    {
        $pibics = $this->pibicIndicacao->where('visivel', '=', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('page.pibic_indicacao.site', compact('pibics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    //Pagina do Evento Para o User
    public function page($pibicindicacao_id)
    {

        $pindicacao = $this->pibicIndicacao->findOrfail($pibicindicacao_id);

        if ($pindicacao->visivel == 0) {
            alert()->error(config('Evento não encontrado', 'Este evento não existe'));
            return redirect()->back();
        }

        if (Auth::check()) {
            $isInscrito = $this->pibicIndicacaoInscricao->where('pibicindicacao_id', $pindicacao->pibicindicacao_id)->where('user_id', Auth::user()->id)->exists();
        } else {
            $isInscrito = false;
        }

        return view('page.pibic_indicacao.page', compact('pindicacao', 'isInscrito'));
    }

    public function create()
    {

        return view($this->bag['view'] . '.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {


            DB::beginTransaction();
            $dados = $request->all();
            //Termo compromisso orientador
            $extensao = $request['banner']->extension();
            $path = 'PibicIndicacaoBolsista/Evento' . '/Banner' . '';
            $nome = 'bannerpibic' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
            $dados['banner'] = $request['banner']->storeAs($path, $nome);

            $dados['data_fim'] = $dados['data_fim'] . ' 23:59:59';
            $dados['status'] = 'Aberto';
            $dados['banner'] = $dados['banner'];
            $pibicindicacao = $this->pibicIndicacao->create($dados);

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
     * @param \App\Models\PibicIndicacao $pibic
     * @return \Illuminate\Http\Response
     */
    public function show(PibicIndicacao $pibic)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\PibicIndicacao $pibicinscricao
     * @return \Illuminate\Http\Response
     */
    public function edit(PibicIndicacao $pibic)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Pibic $pibic
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PibicIndicacao $pibic)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\PibicIndicacao $pibic
     * @return \Illuminate\Http\Response
     */
    public function destroy(PibicIndicacao $pibic)
    {
        //
    }
}
