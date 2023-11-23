<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Http\Requests\Centro\StoreCentroRequest;
use App\Http\Requests\Centro\UpdateCentroRequest;
use App\Models\Centro;
use App\Models\Cidade;
use Illuminate\Http\Request;

class CentroController extends Controller
{
    protected $centro;
    protected $cidades;
    protected $bag = [
        'view' => '',
        'route' => '',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Centro $centro)
    {
        $this->centro = $centro;
    }

    public function index(Request $request)
    {
        $centros = $this->centro->with('cidades')->orderby('id')->paginate(10);
        $links = $centros->appends($request->except('page'));

        $valor = '';

        return view('admin.centro.index', compact('centros', 'links', 'valor'));
    }

    public function create()
    {
       $cidades =  Cidade::select('id', 'cidades')->orderby('cidades', 'asc')->get();
       return view('admin.centro.create', compact('cidades'));
    }

    public function store(StoreCentroRequest $request)
    {
        DB::beginTransaction();
        try {
            Centro::create($request->all());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('centro.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    public function edit($id)
    {
        $centros = $this->centro->findOrfail($id);
        $cidades =  Cidade::select('id', 'cidades')->orderby('cidades', 'asc')->get();
        return view('admin.centro.edit', compact('centros', 'cidades'));
    }


    public function update(UpdateCentroRequest $request, $id)
    {
        DB::beginTransaction();
        try {
            $centros = $this->centro->findOrfail($id);
            $centros->update($request->all());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.update'));
            return redirect()->route('centro.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.update'));
            return redirect()->back();
        }
    }

    public function search(Request $request)
    {
        $centros = Centro::where('centros', 'iLIKE', "%{$request->search}%")
        ->paginate();

        $valor = $request->search;

        $links = $centros->appends($request->except('page'));

        return view('admin.centro.index', compact('centros', 'links', 'valor'));
    }




}
