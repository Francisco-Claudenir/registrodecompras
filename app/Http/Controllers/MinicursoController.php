<?php

namespace App\Http\Controllers;

use App\Models\Minicurso;
use App\Models\SemicEvento;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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



//        $newFormat = $carbonDate->format('Y-m-d H:i');
        try {


            $this->minicurso->update([
                'nome' => $cursos['nome_minicurso'],
                'vagas' => $cursos['vagas_minicurso'],
                'horas' => $cursos['horas_minicurso'],
                'data_hora' => $carbonDate,
                'descricao' => $cursos['descricao'],
                'descricao_ministrante' => $cursos['descricao_ministrante'],
            ]);

            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.update'));
            return redirect()->back();
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
