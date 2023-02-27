<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    protected $client;
    const SESSAO = 'servidor';

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => 'http://new-sigws.intranet.uema.br',
            'headers' => [
                'Content-Type' => 'application/json',
                'apptoken' => 'cb30ca57467aa62d600ab5171f4bef93',
                'appname' => 'sigws_node'
            ]
        ]);
    }

    public function login(Request $request)
    {
        try {
            $result = $this->client->post('/api/login', [
                'body' => json_encode([
                    'login' => $request->login,
                    'senha' => $request->password
                ])
            ]);

            $login = json_decode($result->getBody()->getContents());

            //20695799304
            //BUSCA DADOS DO SERVIDOR
            $response2 = $this->client->get('/api/servidores?cpf=' . $request->login);

            $dados = json_decode($response2->getBody()->getContents());
            // $dados->eleicao = $request->eleicao;

            // foreach ($dados->servidor as $servidor){
            //     if ($servidor->id_situacao == 1)
            //         $dados->servidor = $servidor;
            // }

            if ($result) {
                session()->put($this::SESSAO, $dados);
                return redirect()->route('home');
            } else {
                return back()->withErrors(['login' => 'Usuário ou senha não encontrados']);
                // return view('tema.login.login')->with('error', 'Usuário ou senha não conferem');
            }
        } catch (ClientException $e) {
            // dd($e, view('tema.login.login')->with('error', 'Usuário ou senha não encontrados'));
            return back()->withErrors(['login' => 'Usuário ou senha não encontrados']);
            // return view('tema.login.login')->with('error', 'Usuário ou senha não encontrados');
        }
    }
}
