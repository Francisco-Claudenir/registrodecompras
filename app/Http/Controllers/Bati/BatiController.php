<?php

namespace App\Http\Controllers\Bati;

use App\Http\Controllers\Controller;
use App\Http\Requests\Bati\StoreBatiRequest;
use App\Http\Requests\Bati\UpdateBatiRequest;
use App\Models\Bati;
use App\Models\BatiInscricao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BatiController extends Controller
{
    protected $bati;
    protected $bag = [
        'view' => 'admin.bati',
        'route' => '',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(Bati $bati)
    {
        $this->bati = $bati;
    }

    public function index()
    {
        // $Batis = $this->bati->withCount(0)->paginate(20);
        $Batis = $this->bati->paginate(20);
        $totalBatis = Bati::count();
        return view('admin.bati.index', compact('Batis'));
    }

    public function create()
    {
        return view('admin.bati.create');
    }

    public function site()
    {
        $batis = $this->bati->where('visivel', '=', 1)->orderBy('created_at', 'asc')->paginate(10);
        return view('page.bati.site', compact('batis'));
    }

    public function page($bati_id)
    {
        //dd($bati_id);
        $bati = $this->bati->findOrfail($bati_id);

        if ($bati->visivel == 0) {
            alert()->error(config('Evento não encontrado', 'Este evento não existe'));
            return redirect()->back();
        }

      //  if (Auth::check()) {
      //      $isInscrito = BatiInscricao::where('bati_id', $bati->bati_id)->where('user_id', Auth::user()->id)->exists();
      //  } else {
      //      $isInscrito = false;
      //  }

      // return view('page.bati.page', compact('bati', 'isInscrito'));
       return view('page.bati.page', compact('bati'));
       
    }

    public function store(StoreBatiRequest $request)
    {
        
        try {
            DB::beginTransaction();
            $batis = $request->validated();

            $extensao = $request['banner']->extension();
            $path = 'bati/Evento' . '/Banner' . '';
            $nome = 'bannerbati' . '_' . uniqid(date('HisYmd')) . '.' . $extensao;
            $batis['banner'] = $request['banner']->storeAs($path, $nome);

            $batis['data_fim'] = $batis['data_fim'] . ' 23:59:59';
            $batis['status'] = 'Aberto';
            $batis['banner'] = $batis['banner'];
            $this->bati->create($batis);
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('bati.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }


    public function show(Bati $bati)
    {
        //
    }


    public function edit($id)
    {
        $bati = $this->bati->findOrfail($id);
        return view('admin.bati.edit', compact('bati'));
    }


    public function update(UpdateBatiRequest $request, $id)
    {
        // dd($request->all());
        try {

            DB::beginTransaction();
            $batiUp = $this->bati->findOrfail($id);
            $batis = $request->validated();
            $batis['visivel'] = $request['visivel'] ?? false;
            $batis['data_fim'] = $batis['data_fim'] . ' 23:59:59';
            $batiUp->update($batis);
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('bati.index');

        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.update'));
            return redirect()->back();
        }
    }


    public function destroy(Bati $bati)
    {
        //
    }
}
