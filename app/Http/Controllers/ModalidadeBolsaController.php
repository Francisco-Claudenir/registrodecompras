<?php

namespace App\Http\Controllers;

use App\Http\Requests\Modalidade\StoreModalidadeBolsaRequest;
use App\Http\Requests\Modalidade\UpdateModalidadeBolsaRequest;
use App\Models\ModalidadeBolsa;
use Illuminate\Support\Facades\DB;

class ModalidadeBolsaController extends Controller
{
    protected $modalidadebolsa;
    protected $bag = [
        'view' => '',
        'route' => '',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(ModalidadeBolsa $modalidadebolsa)
    {
        $this->modalidadebolsa = $modalidadebolsa;
    }
    public function index()
    {
        $modalidadebolsas = $this->modalidadebolsa->orderby('nome', 'asc')->get();
         return view('admin.modalidadebolsa.index', compact('modalidadebolsas'));
    }

    public function create()
    {
        return view('admin.modalidadebolsa.create');
    }

   
    public function store(StoreModalidadeBolsaRequest $request)
    {
        DB::beginTransaction();


        try {
            $this->modalidadebolsa->create($request->validated());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('modalidadebolsa.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

   
    public function show(ModalidadeBolsa $modalidadeBolsa)
    {
        //
    }

    public function edit($id)
    {
        $modalidadebolsas = $this->modalidadebolsa->findOrfail($id);
        return view('admin.modalidadebolsa.edit', compact('modalidadebolsas'));
    }


    public function update(UpdateModalidadeBolsaRequest $request, $id)
    {
        DB::beginTransaction();
        
        try {
            $modalidadebolsas = $this->modalidadebolsa->findOrfail($id);
            $modalidadebolsas->update($request->all());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('modalidadebolsa.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    
    public function destroy(ModalidadeBolsa $modalidadeBolsa)
    {
        //
    }
}
