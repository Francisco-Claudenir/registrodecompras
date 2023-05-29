<?php

namespace App\Http\Controllers\PrimeirosPassos;

use App\Http\Controllers\Controller;
use App\Http\Requests\PrimeirosPassos\StorePrimeirosPassosRequest;
use App\Http\Requests\PrimeirosPassos\UpdatePrimeirosPassosRequest;
use App\Models\PrimeiroPasso;
use Illuminate\Support\Facades\DB;

class PrimeiroPassoController extends Controller
{
    protected $primeiropasso;
    protected $bag = [
        'view' => 'admin.primeirospassos',
        'route' => 'primeiropasso',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(PrimeiroPasso $primeiropasso)
    {
        $this->primeiropasso = $primeiropasso;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $primeiropasso = $this->primeiropasso->paginate(20);
        return view($this->bag['view'] . '.index', compact('primeiropasso'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->bag['view'] . '.create');
    }

    //Index para User
    public function site()
    {

        $primeirospassos = $this->primeiropasso->paginate(10);
        return view('page.primeirospassos.site',compact('primeirospassos'));
    }

     //Pagina do Evento Para o User
     public function page($primeiropasso_id)
     {
         $primeiropasso = $this->primeiropasso->findOrfail($primeiropasso_id);

         return view('page.primeirospassos.page', compact('primeiropasso'));
     }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePrimeirosPassosRequest $request)
    {
        try {
            DB::beginTransaction();
            $dados = $request->validated();
            $dados['data_fim'] = $dados['data_fim'] . ' 23:59:59';
            $dados['status'] = 'Aberto';
            $this->primeiropasso->create($dados);

            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route($this->bag['route'] . '.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrimeiroPasso  $primeiropasso
     * @return \Illuminate\Http\Response
     */
    public function show(PrimeiroPasso $primeiropasso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PrimeiroPasso  $primeiropasso
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $primeiropasso = $this->primeiropasso->findOrfail($id);
        return view($this->bag['view'] . '.edit', compact('primeiropasso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrimeiroPasso  $primeiropasso
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePrimeirosPassosRequest $request, $id)
    {
        try {

            DB::beginTransaction();
            $primeiropasso = $this->primeiropasso->findOrfail($id);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrimeiroPasso  $primeiropasso
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrimeiroPasso $primeiropasso)
    {
        //
    }
}
