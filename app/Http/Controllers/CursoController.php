<?php

namespace App\Http\Controllers;

use App\Models\Centro;
use App\Models\Curso;
use App\Models\Modalidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Curso\StoreCursoRequest;
use App\Http\Requests\Curso\UpdateCursoRequest;
use Illuminate\Support\Facades\DB;


class CursoController extends Controller
{
    protected $curso;
    protected $modalidades;
    protected $centros;
    protected $bag = [
        'view' => '',
        'route' => '',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Curso $curso)
    {
        $this->curso = $curso;
    }

    public function index()
    {
        $cursos = $this->curso->with('centros','modalidades')->orderby('id')->get();
        return view('admin.curso.index', compact('cursos'));
    }

    public function create()
    {
       $modalidades =  Modalidade::select('id', 'modalidades')->orderby('modalidades', 'asc')->get();
       $centros =  Centro::select('id', 'centros')->orderby('centros', 'asc')->get();
       return view('admin.curso.create', compact('modalidades' , 'centros'));
    }

    public function store(StoreCursoRequest $request)
    {
        DB::beginTransaction();
        try {
            Curso::create($request->validated());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('curso.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $cursos = $this->curso->findOrfail($id);
        $modalidades =  Modalidade::select('id', 'modalidades')->orderby('modalidades', 'asc')->get();
        $centros =  Centro::select('id', 'centros')->orderby('centros', 'asc')->get();
        return view('admin.curso.edit', compact('cursos', 'modalidades', 'centros'));
    }


    public function update(UpdateCursoRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $cursos = $this->curso->findOrfail($id);
            $cursos->update($request->all());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.update'));
            return redirect()->route('curso.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.update'));
            return redirect()->back();
        }
    }

    public function getCurso(Request $request){

        $cursos = Curso::where('centro_id','=', $request->centro)->get();

        return Response::json($cursos);
    }


}
