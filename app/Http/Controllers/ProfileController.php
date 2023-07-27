<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Models\User;


class ProfileController extends Controller
{
    // protected $currentuser;
    // protected $documentos;
    // protected $especificas;
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

        $endereco = json_decode($dadosUser->endereco, true);

        return view( 'profile.index', compact('dadosUser', 'endereco'));
    }

    public function update(UpdateProfileRequest $request, $profile)
    {
        DB::beginTransaction();
        try {
            $user = $this->user->findOrfail($profile);
            $request['endereco'] = json_encode($request['endereco']);
                  
            $user->update($request->all());
            DB::commit();
            alert()->success(config($this->bag['msg'] . '.success.update'));
            return redirect()->route('profile.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            alert()->error(config($this->bag['msg'] . '.error.create'));
            return redirect()->back();
        }
    }
}
