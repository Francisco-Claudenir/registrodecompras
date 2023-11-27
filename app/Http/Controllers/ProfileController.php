<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Http\Requests\Profile\UpdateSenhaProfileRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{

     protected $user;

    protected $bag = [
        'view' => '',
        'route' => '',
        'Title' => '',
        'subtitle' => '',
        'msg' => 'temauema.msg.register'
    ];

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $dadosUser = Auth::User();

        $endereco = json_decode($dadosUser['endereco'], true);

        return view( 'profile.index', compact('dadosUser', 'endereco'));
    }

    public function update(UpdateProfileRequest $request, $profile)
    {
        DB::beginTransaction();
        try {
            $user = $this->user->findOrfail($profile);

            $userUpdate = $request->all();

            $userUpdate['endereco']['cep'] = str_replace(['.', '-'], '', $userUpdate['endereco']['cep']);

            $userUpdate['endereco'] = json_encode($userUpdate['endereco']);

            $user->update($userUpdate);
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.update'));
            return redirect()->route('profile.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }

    public function updateSenha (UpdateSenhaProfileRequest $request)
    {
        $dadosUser = Auth::User();

        if (!Hash::check($request->old_password, $dadosUser->password)) {
            alert()->error('A senha não confere com a cadastrada');
            return redirect()->route('profile.index');
        }


        DB::beginTransaction();

        try {
            $dadosUser->update([
                'password' => Hash::make($request->all()['new_password'])
            ]);
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.update'));
            return redirect()->route('profile.index');
        } catch (\Exception $e) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }


    }


}
