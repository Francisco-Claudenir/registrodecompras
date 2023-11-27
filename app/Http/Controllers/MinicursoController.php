<?php

namespace App\Http\Controllers;

use App\Models\Minicurso;
use App\Models\MinicursoSemiceventoinscricao;
use App\Models\SemicEvento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class MinicursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $semic_evento, $minicurso;

    protected $bag = [
        'view' => 'admin.semic_evento',
        'route' => 'semicevento',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(SemicEvento $semic_evento, Minicurso $minicurso)
    {
        $this->semic_evento = $semic_evento;
        $this->minicurso = $minicurso;
    }
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $semic_evento_id)
    {

        $semic_evento = $this->semic_evento->findOrfail($semic_evento_id);

        $cursos = $request->all();
        $carbonDate = Carbon::createFromFormat('l d F Y - H:i', $cursos['data_hora']);
        $newFormat = $carbonDate->format('Y-m-d H:i');
        try {
            $this->minicurso->create([
                'nome' => $cursos['nome_minicurso'],
                'vagas' => $cursos['vagas_minicurso'],
                'horas' => $cursos['horas_minicurso'],
                'data_hora' => $newFormat,
                'descricao' => $cursos['descricao'],
                'descricao_ministrante' => $cursos['descricao_ministrante'],
                'semicevento_id' => $semic_evento->semic_evento_id
            ]);

            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Minicurso $minicurso
     * @return \Illuminate\Http\Response
     */
    public function show(Minicurso $minicurso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Minicurso $minicurso
     * @return \Illuminate\Http\Response
     */
    public function edit(Minicurso $minicurso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Minicurso $minicurso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Minicurso $minicurso)
    {
        $cursos = $request->all();
        try {
            $carbonDate = Carbon::parse($cursos['data_hora']);
            if ($carbonDate instanceof Carbon) {
                $cursos['data_hora'] = $carbonDate->format('Y-m-d H:i:s');
            }
        } catch (\Exception $e) {
            $carbonDate2 = Carbon::createFromFormat('l d F Y - H:i', $cursos['data_hora']);
            if ($carbonDate2 instanceof Carbon) {
                $cursos['data_hora'] = $carbonDate2->format('Y-m-d H:i:s');
            }
        }
        try {
            $minicurso->update([
                'nome' => $cursos['nome_minicurso'],
                'vagas' => $cursos['vagas_minicurso'],
                'horas' => $cursos['horas_minicurso'],
                'data_hora' => $cursos['data_hora'],
                'descricao' => $cursos['descricao'],
                'descricao_ministrante' => $cursos['descricao_ministrante'],
            ]);
            //            $this->minicurso->update([
            //                'nome' => $cursos['nome_minicurso'],
            //                'vagas' => $cursos['vagas_minicurso'],
            //                'horas' => $cursos['horas_minicurso'],
            //                'descricao' => $cursos['descricao'],
            //                'descricao_ministrante' => $cursos['descricao_ministrante'],
            //            ]);

            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.update'));
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.update'));
            return redirect()->back();
        }
    }

    public function analiseMinicursoEspelho($id)
    {

        $dadosInscrito = MinicursoSemiceventoinscricao::join('minicursos', 'minicurso_semiceventoinscricao.minicurso_id', '=', 'minicursos.minicurso_id')
            ->join('semic_eventoinscricao', 'minicurso_semiceventoinscricao.semic_eventoinscricao_id', '=', 'semic_eventoinscricao.semic_eventoinscricao_id')
            ->join('users', 'semic_eventoinscricao.user_id', '=', 'users.id')
            ->select([
                'minicursos.nome as nome_minicurso',
                'users.nome',
                'users.cpf',
                'users.email',
                'minicurso_semiceventoinscricao.minicursosemiceventoinscricao_id',
                'semic_eventoinscricao.semic_evento_id',
                'semic_eventoinscricao.numero_inscricao',
                'semic_eventoinscricao.tipo'
            ])
            ->find($id);

        $semicEvento = SemicEvento::find($dadosInscrito->semic_evento_id);

        return view('admin.semic_evento.espelhominicurso', compact('dadosInscrito', 'semicEvento'));
    }

    public function analise(Request $request, $id)
    {
        try {
            if (auth::user()->can('check-role', 'Administrador|Coordenação de Pesquisa')) {
                DB::beginTransaction();
                $inscricaoMinicurso = MinicursoSemiceventoinscricao::findOrfail($id);
                $inscricaoMinicurso->update(['status' => $request['status']]);
                DB::commit();
                alert()->success(config($this->bag['msg'] . '.success.update'));
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            dd($th);
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.update'));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Minicurso $minicurso
     * @return \Illuminate\Http\Response
     */
    public function destroy(Minicurso $minicurso)
    {
        //
        dd($minicurso);
    }
}
