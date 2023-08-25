<?php

namespace App\Http\Controllers\Semic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Semic\StoreSemicRequest;
use App\Http\Requests\Semic\UpdateSemicRequest;
use App\Models\Semic;
use App\Models\SemicInscricao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SemicController extends Controller
{
    protected $semic;
    protected $bag = [
        'view' => 'admin.semic',
        'route' => 'semic',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Semic $semic)
    {
        $this->semic = $semic;
    }

    public function index()
    {
        $programasSemic = $this->semic->withCount('semic_semicInscricao')->paginate(20);
        return view('admin.semic.index', compact('programasSemic'));
    }

    public function site()
    {
        $semics = $this->semic->where('visivel', '=', 1)->orderBy('created_at', 'desc')->paginate(10);
        return view('page.semic.site', compact('semics'));
    }

    public function page($semic_id)
    {
        $semic = $this->semic->findOrfail($semic_id);

        if ($semic->visivel == 0) {
            alert()->error(config('Evento não encontrado', 'Este evento não existe'));
            return redirect()->back();
        }

        if (Auth::check()) {
            $isInscrito = SemicInscricao::where('semic_id', $semic->semic_id)->where('user_id', Auth::user()->id)->exists();
        } else {
            $isInscrito = false;
        }

       return view('page.semic.page', compact('semic', 'isInscrito'));
        //return view('page.semic.page', compact('semic'));
    }

    
    public function create()
    {
        return view('admin.semic.create');
    }

   
    public function store(StoreSemicRequest $request)
    {
     //  dd($request->all(),$request);
        try {
            DB::beginTransaction();
            $semics = $request->validated();

            $extensao = $request['banner']->extension();
            $path = 'semic/Evento' . '/Banner' . '';
            $nome = 'bannersemic' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
            $semics['banner'] = $request['banner']->storeAs($path, $nome);

            $semics['data_fim'] = $semics['data_fim'] . ' 23:59:59';
            $semics['status'] = 'Aberto';
            $semics['banner'] = $semics['banner'];
            $this->semic->create($semics);
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('semic.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

 
    public function show(Semic $semic)
    {
        //
    }

   
    public function edit($id)
    {
        $semic = $this->semic->findOrfail($id);
        return view('admin.semic.edit', compact('semic'));
    }

   
    public function update(UpdateSemicRequest $request, $id)
    {
        try {

            DB::beginTransaction();
            $semicUp = $this->semic->findOrfail($id);
            $semics = $request->validated();
            $semics['visivel'] = $request['visivel'] ?? false;
            $semics['data_fim'] = $semics['data_fim'] . ' 23:59:59';
            $semicUp->update($semics);
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.update'));
            return redirect()->route('semic.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.update'));
            return redirect()->back();
        }
    }

    
    public function destroy(Semic $semic)
    {
        //
    }
}
