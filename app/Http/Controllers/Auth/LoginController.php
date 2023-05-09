<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    
    protected $redirectTo = RouteServiceProvider::HOME;

    public function index()
    {
        return view('auth.login');    
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'usuario' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)){
            return redirect()->intended('dash');
        }

        return back()->withErrors([
            'usuario' => 'Teste de erro'
        ]);
    }

    public function destroy()
    {
        Auth::logout();
        return redirect()->route('login.index');
    }


    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    // public function username()
    // {
    //     return 'usuario';
    // }


}
