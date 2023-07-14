<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Export\ExportsController;
use App\Http\Controllers\GrandeAreaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\Bati\BatiController;
use App\Http\Controllers\ModalidadeBolsaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PibicIndicacaoController;
use App\Http\Controllers\PibicIndicacaoInscricaoController;
use App\Http\Controllers\PP_IndicacaoBolsistas\PP_IndicacaoBolsistasController;
use App\Http\Controllers\PP_IndicacaoBolsistas\PP_IndicacaoBolsistasInscricaoController;
use App\Http\Controllers\Semic\SemicController;
use App\Http\Controllers\PrimeirosPassos\PrimeiroPassoController;
use App\Http\Controllers\PrimeirosPassos\PrimeirosPassosInscricaoController;
use App\Http\Controllers\SubAreaController;
use App\Http\Controllers\UserController;

Route::get('/', [HomeController::class, 'index'])->name('home');



Route::post('login-eventos', [LoginController::class, 'loginEvento'])->name('login.eventos');
Route::post('logout-eventos', [LoginController::class, 'logoutEvento'])->name('logout.eventos');
Auth::routes();

// Route::get('/', [App\Http\Controllers\LoginController::class, 'index'])->name('login.index');
// Route::post('/', [App\Http\Controllers\LoginController::class, 'store'])->name('login.store');
// Route::post('/logout', [App\Http\Controllers\LoginController::class, 'destroy'])->name('login.destroy');

Route::post('login-servidor', [ApiController::class, 'login'])->name('login-professor');
Route::post('login-servidor', [ApiController::class, 'login'])->name('login-professor');




Route::prefix('admin')->middleware(['auth'])->group(function () {



    Route::resource('auditoria', AuditoriaController::class);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('admin.home')->middleware(['check-role:Administrador|Coordenação de Pesquisa|Coordenação de Pós Graduação|Gabinete']);
    Route::get('/areaajax', [App\Http\Controllers\HomeController::class, 'indexajax'])->name('areaajax');

    //Semic
    Route::resource('semic', SemicController::class);

    //Pibic
    Route::resource('pibic-indicacao', PibicIndicacaoController::class);

    //PrimeiroPassos
    Route::resource('primeiropasso', PrimeiroPassoController::class)->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //GrandeArea
    Route::resource('grandearea', GrandeAreaController::class)->middleware(['check-role:Administrador']);

    //Perfil
    Route::resource('perfil', PerfilController::class)->middleware(['check-role:Administrador']);

    //SubArea
    Route::resource('subarea', SubAreaController::class)->middleware(['check-role:Administrador']);

    //PrimeirosPassos Inscricão Execel
    Route::get('/primeirospassos/inscritos/{primeiropasso_id}', [ExportsController::class, 'primeirosPassosInscritos'])->name('lista.inscritos')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //PrimeirosPassos Inscricão Espelho ADMIN
    Route::get('primeirospassos/espelho/{primeiropasso_id}/{passos_inscricao_id}', [PrimeirosPassosInscricaoController::class, 'espelho'])->name('primeirospassos.inscricao.espelho')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Analise Primeiros Passos Inscrição
    Route::post('/primeirospassos/analise/{primeiropasso_id}/{passos_inscricao_id}', [PrimeirosPassosInscricaoController::class, 'analise'])->name('primeirospassosinscricao.analise')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);


    //User
    Route::resource('users', UserController::class);

    //ModalidadeBolsa
    Route::resource('modalidadebolsa', ModalidadeBolsaController::class)->middleware(['check-role:Administrador']);

    //bati
    Route::resource('bati', BatiController::class);

    //PrimeirosPassos Indicacao Bolsistas
    Route::resource('pp-indicacao-bolsistas', PP_IndicacaoBolsistasController::class)->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //PP_IndicacaoBolsistas Inscricão Execel
    Route::get('/pp-indicacao-bolsistas/inscritos/{pp_indicacao_bolsista_id}', [ExportsController::class, 'ppIndicacaoBolsista'])->name('lista.pp_i_bolsista.excel')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //PP_IndicacaoBolsistas Inscricão Espelho
    Route::get('pp-indicacao-bolsistas/espelho/{pp_indicacao_bolsista_id}/{pp_i_bolsista_inscricao_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'espelho'])->name('pp-i-bolsistas-inscricao.espelho')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Analise Primeiros Passos Inscrição
    Route::post('/pp-indicacao-bolsistas/analise/{pp_indicacao_bolsista_id}/{pp_i_bolsista_inscricao_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'analise'])->name('pp-i-bolsistas-inscricao.analise')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);
});






Route::prefix('site')->group(function () {

    //Semic
    //Route::get('/semic', [SemicController::class, 'site'])->name('site.semic');

    //Pibic
    Route::get('/pibic-indicacao', [PibicIndicacaoController::class, 'site'])->name('site.pibic-indicacao');

    //PrimeiroPassos
    Route::get('/primeiropasso', [PrimeiroPassoController::class, 'site'])->name('site.primeiropasso');


    //PrimeirosPassos Indicacao Bolsistas
    Route::get('/pp-indicacao-bolsistas', [PP_IndicacaoBolsistasController::class, 'site'])->name('site.pp-indicacao-bolsistas');
});

//Inscrições de Eventos -  VIEW CANDIDATOS Pibic
Route::prefix('pibic-indicacao')->group(function () {
    Route::get('/{pibicindicacao_id}', [PibicIndicacaoController::class, 'page'])->name('pibic.page');
    Route::get('/inscricao/{pibicindicacao_id}', [PibicIndicacaoInscricaoController::class, 'create'])->name('pibicindicacao.inscricao.create');
    // Route::post('/inscricao', [PrimeirosPassosInscricaoController::class, 'store'])->name('primeirospassos.inscricao.store');
    // Route::get('/lista-inscricao/{primeiropasso_id}', [PrimeirosPassosInscricaoController::class, 'index'])->name('primeirospassos.inscricao.index')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);
    // Route::get('/pdf/{primeiropasso_id}/{passos_inscricao_id}', [PrimeirosPassosInscricaoController::class, 'gerarPDF'])->name('primeirospassos.inscricao.pdf');
    // Route::get('/docshow/{diretorio}', [PrimeirosPassosInscricaoController::class, 'docshow'])->name('primeirospassos.inscricao.docshow');
    Route::get('/verinscricao/{pibicindicacao_id}/{user_id}', [PibicIndicacaoInscricaoController::class, 'show'])->name('pibicindicacao.inscricao.show');
});


//Inscrições de Eventos -  VIEW CANDIDATOS PRIMEIROS PASSOS
Route::prefix('primeirospassos')->group(function () {
    Route::get('/{primeiropasso_id}', [PrimeiroPassoController::class, 'page'])->name('primeirospassos.page');
    Route::get('/inscricao/{primeiropasso_id}', [PrimeirosPassosInscricaoController::class, 'create'])->name('primeirospassos.inscricao.create')->middleware(['auth']);
    Route::post('/inscricao', [PrimeirosPassosInscricaoController::class, 'store'])->name('primeirospassos.inscricao.store')->middleware(['auth']);
    Route::get('/lista-inscricao/{primeiropasso_id}', [PrimeirosPassosInscricaoController::class, 'index'])->name('primeirospassos.inscricao.index')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);
    Route::get('/pdf/{primeiropasso_id}/{passos_inscricao_id}', [PrimeirosPassosInscricaoController::class, 'gerarPDF'])->name('primeirospassos.inscricao.pdf')->middleware(['auth']);
    Route::get('/docshow/{diretorio}', [PrimeirosPassosInscricaoController::class, 'docshow'])->name('primeirospassos.inscricao.docshow')->middleware(['auth']);
    Route::get('/verinscricao/{primeiropasso_id}/{user_id}', [PrimeirosPassosInscricaoController::class, 'show'])->name('primeirospassos.inscricao.show')->middleware(['auth']);
});

//Inscrições de Eventos -  VIEW CANDIDATOS PP_IndicacaoBolsistas
Route::prefix('pp-indicacao-bolsistas')->group(function () {
    Route::get('/{pp_indicacao_bolsista_id}', [PP_IndicacaoBolsistasController::class, 'page'])->name('pp-i-bolsistas.page');
    Route::get('/inscricao/{pp_indicacao_bolsista_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'create'])->name('pp-i-bolsistas-inscricao.create')->middleware(['auth']);
    Route::post('/inscricao/{pp_indicacao_bolsista_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'store'])->name('pp-i-bolsistas-inscricao.store')->middleware(['auth']);
    Route::get('/lista-inscricao/{pp_indicacao_bolsista_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'index'])->name('pp-i-bolsistas-inscricao.index')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);
    Route::get('/pdf/{pp_indicacao_bolsista_id}/{pp_i_bolsista_inscricao_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'gerarPDF'])->name('pp-i-bolsistas-inscricao.pdf')->middleware(['auth']);
    Route::get('/docshow/{diretorio}', [PP_IndicacaoBolsistasInscricaoController::class, 'docshow'])->name('pp-i-bolsistas-inscricao.docshow')->middleware(['auth']);
    Route::get('/verinscricao/{pp_indicacao_bolsista_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'show'])->name('pp-i-bolsistas-inscricao.show')->middleware(['auth']);
});

Route::post('/getcursos', [CursoController::class, 'getCurso'])->name('getCurso');

Route::get('teste', function () {
    return view('pdf.primeirospassos');
});

Route::get('tela', function () {
    return view('tela');
});
