<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class CursoController extends Controller
{

    public function getCurso(Request $request){

        $cursos = Curso::where('centro_id','=', $request->centro)->get();

        return Response::json($cursos);
    }
}
