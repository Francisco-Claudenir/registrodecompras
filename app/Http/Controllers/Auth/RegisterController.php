<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        return Validator::make($data, [
            'nome' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf' => ['required', 'string', 'cpf', 'unique:users', 'size:11'],
            'telefone' => ['required', 'string', 'min:2', 'max:45'],
            'password' => ['required', 'confirmed', 'string', 'min:8', 'max:255'],
            'endereco' => ['required', 'array'],
            'endereco.cep' => ['required', 'digits:8'],
            'endereco.endereco' => ['required'],
            'endereco.numero' => ['required'],
            'endereco.bairro' => ['required']

        ], [
            //cep
            'endereco.cep.required' => 'O cep é obrigatório',
            'endereco.cep.digits' => 'O cep deve conter 8 dígitos',
            //numero
            'endereco.numero.required' => 'O numero é obrigatório',
            //endereco
            'endereco.endereco.required' => 'O endereco é obrigatório',
            //Bairro
            'endereco.bairro.required' => 'O bairro é obrigatório',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'nome' => $data['nome'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'telefone' => $data['telefone'],
            'endereco' => json_encode($data['endereco']),
            'password' => Hash::make($data['password']),
        ]);
    }
}
