<?php

namespace App\Http\Controllers\PrimeirosPassos;

use App\Models\SubArea;
use App\Models\GrandeArea;
use App\Models\PrimeiroPasso;
use App\Http\Controllers\Controller;
use App\Models\PrimeirosPassosInscricao;
use App\Http\Requests\PrimeirosPassos\StorePrimeirosPassosInscricaoRequest;
use App\Http\Requests\PrimeirosPassos\UpdatePrimeirosPassosInscricaoRequest;
use App\Models\PlanoTrabalho;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PrimeirosPassosInscricaoController extends Controller
{
    protected $primeirospassosinscricao;
    protected $grandearea;
    protected $subarea;
    protected $primeiropasso;
    protected $planotrabalho;

    protected $bag = [
        'view' => 'page.primeirospassos',
        'route' => 'primeirospassos',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(PrimeirosPassosInscricao $primeirospassosinscricao, GrandeArea $grandearea, SubArea $subarea, PrimeiroPasso $primeiropasso, PlanoTrabalho $planotrabalho)
    {
        $this->primeirospassosinscricao = $primeirospassosinscricao;
        $this->primeiropasso = $primeiropasso;
        $this->grandearea = $grandearea;
        $this->subarea = $subarea;
        $this->planotrabalho = $planotrabalho;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($primeiropasso_id)
    {
        //Verificando se o id existe
        $this->primeiropasso->findOrfail($primeiropasso_id);

        //Buscando a lista de inscritos atraves de join
        $listaInscritos = $this->primeirospassosinscricao
            ->join('users', 'users.id', '=', 'primeiros_passos_inscricaos.user_id')
            ->where('primeiros_passos_inscricaos.primeiropasso_id', '=', $primeiropasso_id)
            ->select([
                'users.nome',
                'users.email',
                'users.cpf',
                'users.telefone',
                'primeiros_passos_inscricaos.primeiropasso_id',
                'primeiros_passos_inscricaos.passos_inscricao_id'
            ])->paginate(15);
            
        dd($listaInscritos);
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
        // dd($request->all(),$primeiropasso_id);

        try {
            DB::beginTransaction();

             //Verifica se data correta para realizar inscrição
            if (true) {

                //Create de inscrição
                $inscricao = $this->primeirospassosinscricao->create([
                    'primeiropasso_id' => $request['primeiropasso_id'],
                    'user_id' => Auth::user()->id,
                    'areaconhecimento_id' => $request['areaconhecimento_id'],
                    'identidade' => $request['identidade'],
                    'matricula' => $request['matricula'],
                    'centro' => $request['centro'],
                    'copiacontrato' => 'aindavoufazer',              //file
                    'tituloprojetopesquisa' => $request['tituloprojetopesquisa'],
                    'resumoprojeto' => $request['resumoprojeto'],
                    'projetopesquisa' => 'aindavoufazer',          //file
                    'chefeimediato' => $request['chefeimediato'],
                    'parecercomite' => 'aindavoufazer',          //file
                    'curriculolattes' => 'aindavoufazer',       //file

                ]);


                // //Create de Plano de trabalho
                // $plano = $this->planotrabalho->create([
                //     'titulo' => $request['titulo'],
                //     'modalidade_id' => $request['modalidade_id'] ?? 1,
                //     'resumo' => $request['resumo'],
                //     'arquivo' => 'aindavoufazer'
                // ]);


                // //Adiciona a relação Plano trabalho / Inscrição
 
                // $inscricao->planotrabalho()->attach($plano->plano_id);

                


            } else {
                alert()->error(config($this->bag['msg'] . '.error.inscricao'));
            }
            
            
  
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.inscricao'));
            return redirect()->route('primeirospassos.page', ['primeiropasso_id' => $request['primeiropasso_id']]);
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
