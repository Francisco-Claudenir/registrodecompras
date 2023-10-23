<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Models\Perfil;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $user, $perfil;
    protected $bag = [
        'view' => 'admin.users',
        'route' => 'users',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];
    public function __construct(User $user, Perfil $perfil)
    {
        $this->user = $user;
        $this->perfil = $perfil;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = $this->user->with('perfil')->paginate(10);
        $links = $users->appends($request->except('page'));

        return view($this->bag['view'] . '.index', compact('users','links'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $perfis = $this->perfil->get();
        return view($this->bag['view'] . '.create', compact('perfis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUserRequest $request)
    {

        DB::beginTransaction();

        try {
            $request['password'] = Hash::make($request['password']);
            $request['endereco'] = json_encode($request['endereco']);
            $this->user->create($request->validated());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route($this->bag['route'] . '.' . 'index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function resetPass(Request $request, $id)
    {
        if (!$usuario = $this->user->find($id))
        {
            //Se não encontrar o ID de usuário, retorna ao index com mensagem de erro
            alert()->error(config($this->bag['msg'] . '.error.update'));
            return redirect()->back();
        }

        $senhapadrao = '123456789';

        DB::beginTransaction();

        try {
            $this->user->find($id)->update([
                'password' => Hash::make($senhapadrao)
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            //Se der erro, retorna ao index de funcionário com mensagem de erro
            toastr()->error('Erro ao resetar senha de funcionário!');
            return redirect()->back();
        }
            //Após atualizado, retorna ao index de funcionário com mensagem de sucesso
            alert()->error(config($this->bag['msg'] . '.success.update'));
            return redirect()->route($this->bag['route'] . '.' . 'index');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $perfis = $this->perfil->get();
        $user = $this->user->find($id);
        $endereco = json_decode($user->endereco, true);
        return view($this->bag['view'] . '.edit', compact('user', 'perfis', 'endereco'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = $this->user->findOrfail($id);
            $request['endereco'] = json_encode($request['endereco']);

            $user->update($request->all());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.create'));
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
