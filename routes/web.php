<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\AuditoriaController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Export\ExportsController;
use App\Http\Controllers\GrandeAreaController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\CentroController;
use App\Http\Controllers\Bati\BatiController;
use App\Http\Controllers\Bati\BatiInscricaoController;
use App\Http\Controllers\ProfileController;
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
use App\Http\Controllers\SemicEvento\SemicEventoController;
use App\Http\Controllers\SemicEvento\SemicEventoInscricaoController;
use App\Http\Controllers\Semic\SemicInscricaoController;
use App\Http\Controllers\PrimeirosPassos\PrimeiroPassoController;
use App\Http\Controllers\PrimeirosPassos\PrimeirosPassosInscricaoController;
use App\Http\Controllers\SubAreaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MinicursoController;
use App\Http\Controllers\CertificadoController;
use App\Http\Controllers\CertificadoInscricaoController;


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


    Route::resource('auditoria', AuditoriaController::class)->middleware(['check-role:Administrador']);

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('admin.home')->middleware(['check-role:Administrador|Coordenação de Pesquisa|Coordenação de Pós Graduação|Gabinete']);
    Route::get('/areaajax', [App\Http\Controllers\HomeController::class, 'indexajax'])->name('areaajax');

    //Certificado
    Route::post('certificado/{semic_evento_id}', [SemicEventoController::class, 'storecertificado'])->name('store.certificado');

    //Minicurso
    Route::post('minicursos/{semic_evento_id}', [MinicursoController::class, 'store'])->name('store.minicursos');
    Route::put('minicursos/editar/{minicurso}', [MinicursoController::class, 'update'])->name('update.minicursos');
    Route::delete('minicursos/{semic_evento_id}', [MinicursoController::class, 'destroy'])->name('destroy.minicursos');
    Route::get('/minicursos/inscritos/{minicurso}', [ExportsController::class, 'minicursoInscritos'])->name('lista.inscritos.minicurso')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);



    //Semic
    Route::resource('semic', SemicController::class)->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Pibic
    Route::resource('pibic-indicacao', PibicIndicacaoController::class);

    //PrimeiroPassos
    Route::resource('primeiropasso', PrimeiroPassoController::class)->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //SemicInscricao
    Route::resource('semicinscricao', SemicInscricaoController::class);

    //GrandeArea
    Route::resource('grandearea', GrandeAreaController::class)->middleware(['check-role:Administrador']);

    //Perfil
    Route::resource('perfil', PerfilController::class)->middleware(['check-role:Administrador']);

    //SubArea
    Route::resource('subarea', SubAreaController::class)->middleware(['check-role:Administrador']);

    //SemicEvento Inscricão Espelho ADMIN
    Route::get('semicevento_/espelho/{semic_evento_id}/{semic_eventoinscricao_id}', [SemicEventoInscricaoController::class, 'espelho'])->name('semic.eventoinscricao.espelho')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Semic_evento Inscricão Execel
    Route::get('/semicevento/inscritos/{semic_evento_id}/{tipo}', [ExportsController::class, 'semiceventoInscritos'])->name('lista.inscritos.semicevento')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Analise Semic_evento Inscrição
    Route::post('semicevento/analise/{semic_evento_id}/{semic_eventoinscricao_id}', [SemicEventoInscricaoController::class, 'analise'])->name('semic.eventoinscricao.analise')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Delete Semic_evento Inscrição
    Route::get('semicevento/cancelar/{semic_eventoinscricao_id}', [SemicEventoInscricaoController::class, 'destroy'])->name('semic.eventoinscricao.destroy')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //bati Inscricão Execel
    Route::get('/bati/inscritos/{bati_id}', [ExportsController::class, 'batiInscritos'])->name('lista.inscritos.bati')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);


    //bati Inscricão Espelho ADMIN
    Route::get('bati/espelho/{bati_id}/{bati_inscricao_id}', [BatiInscricaoController::class, 'espelho'])->name('bati.inscricao.espelho')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Analise bati Inscrição
    Route::post('bati/analise/{bati_id}/{bati_inscricao_id}', [BatiInscricaoController::class, 'analise'])->name('bati.inscricao.analise')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //PrimeirosPassos Inscricão Execel
    Route::get('/primeirospassos/inscritos/{primeiropasso_id}', [ExportsController::class, 'primeirosPassosInscritos'])->name('lista.inscritos')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //PrimeirosPassos Inscricão Espelho ADMIN
    Route::get('primeirospassos/espelho/{primeiropasso_id}/{passos_inscricao_id}', [PrimeirosPassosInscricaoController::class, 'espelho'])->name('primeirospassos.inscricao.espelho')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Semic Inscricão Execel
    Route::get('/semic/inscritos/{semic_id}', [ExportsController::class, 'semicInscritos'])->name('lista.inscritos.semic')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Semic Inscricão Espelho ADMIN
    Route::get('semic/espelho/{semic_id}/{semic_inscricao_id}', [SemicInscricaoController::class, 'espelho'])->name('semic.inscricao.espelho')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Analise Semic Inscrição
    Route::post('semic/analise/{semic_id}/{semic_inscricao_id}', [SemicInscricaoController::class, 'analise'])->name('semic.inscricao.analise')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Analise Primeiros Passos Inscrição
    Route::post('/primeirospassos/analise/{primeiropasso_id}/{passos_inscricao_id}', [PrimeirosPassosInscricaoController::class, 'analise'])->name('primeirospassosinscricao.analise')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //PP_IndicacaoBolsistas Inscricão Execel
    Route::get('/pibic-indicacao/inscritos/{pibicindicacao_id}', [ExportsController::class, 'pibicIndicacaoInscricao'])->name('lista.pibicindicacao.excel')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //User
    Route::resource('users', UserController::class);

    //User Seach
    Route::post('/posts/search/users', [UserController::class, 'search'])->name('user.posts.search');

    Route::put('/user/pass_reset/{id}', [UserController::class, 'resetPass'])->name('user.passreset')->middleware(['check-role:Administrador']);

    //ModalidadeBolsa
    Route::resource('modalidadebolsa', ModalidadeBolsaController::class)->middleware(['check-role:Administrador']);

    //bati
    Route::resource('bati', BatiController::class);

    //Cursos
    Route::resource('curso', CursoController::class);

     //Cursos Seach
     Route::post('/posts/search/cursos', [CursoController::class, 'search'])->name('curso.posts.search');

    //SemicEvento
    Route::resource('semicevento', SemicEventoController::class);
    Route::get('/semicevento/minicursos/{semic_evento_id}', [SemicEventoController::class, 'minicursos'])->name('semicevento.minicursos')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);
    Route::get('/semicevento/certificados/{semic_evento_id}', [SemicEventoController::class, 'certificados'])->name('semicevento.certificados')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);
    Route::get('/semicevento/minicursos/{semic_evento_id}/{minicurso_id}', [SemicEventoInscricaoController::class, 'indexminicurso'])->name('listaminicurso.semicevento')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);



    //Centro
    Route::resource('centro', CentroController::class);

     //Centro Seach
     Route::post('/posts/search/centros', [CentroController::class, 'search'])->name('centro.posts.search');

    //PrimeirosPassos Indicacao Bolsistas
    Route::resource('pp-indicacao-bolsistas', PP_IndicacaoBolsistasController::class)->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //PP_IndicacaoBolsistas Inscricão Execel
    Route::get('/pp-indicacao-bolsistas/inscritos/{pp_indicacao_bolsista_id}', [ExportsController::class, 'ppIndicacaoBolsista'])->name('lista.pp_i_bolsista.excel')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //PP_IndicacaoBolsistas Inscricão Espelho
    Route::get('pp-indicacao-bolsistas/espelho/{pp_indicacao_bolsista_id}/{pp_i_bolsista_inscricao_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'espelho'])->name('pp-i-bolsistas-inscricao.espelho')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Analise Primeiros Passos Inscrição
    Route::post('/pp-indicacao-bolsistas/analise/{pp_indicacao_bolsista_id}/{pp_i_bolsista_inscricao_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'analise'])->name('pp-i-bolsistas-inscricao.analise')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);


    //Pibic Espelho ADM
    Route::get('pibic-indicacao/espelho/{pibic_indicacao_id}/{pibic_i_inscricao_id}', [PibicIndicacaoInscricaoController::class, 'espelho'])->name('pibicindicacao.inscricao.espelho')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);

    //Analise Pibic Inscrição
    Route::post('/pibic-indicacao/analise/{pibic_indicacao_id}/{pibic_i_inscricao_id}', [PibicIndicacaoInscricaoController::class, 'analise'])->name('pibicindicacao.analise')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);
});



//Certificado Inscrição
Route::resource('certificado-inscricao', CertificadoInscricaoController::class, ['only' => ['create', 'edit', 'update']])->middleware(['auth']);
//Route::get('/certificado-inscricao/create/{id}', [App\Http\Controllers\CertificadoInscricaoController::class, 'store'])->name('certificado-inscricao.create');

//Profile
Route::post('profile/senha', [ProfileController::class, 'updateSenha'])->name('profile.updateSenha');
Route::resource('profile', ProfileController::class)->middleware(['auth']);


Route::prefix('site')->group(function () {

    //Semic
    Route::get('/semic', [SemicController::class, 'site'])->name('site.semic');

    //SemicEvento
    Route::get('/semicevento', [SemicEventoController::class, 'site'])->name('site.semicevento');

    //Bati
    Route::get('/bati', [BatiController::class, 'site'])->name('site.bati');

    //Pibic
    Route::get('/pibic-indicacao', [PibicIndicacaoController::class, 'site'])->name('site.pibic-indicacao');

    //PrimeiroPassos
    Route::get('/primeiropasso', [PrimeiroPassoController::class, 'site'])->name('site.primeiropasso');

    //PrimeirosPassos Indicacao Bolsistas
    Route::get('/pp-indicacao-bolsistas', [PP_IndicacaoBolsistasController::class, 'site'])->name('site.pp-indicacao-bolsistas');
});

//Inscrições de Eventos -  VIEW CANDIDATOS Pibic
Route::prefix('pibic-indicacao')->group(function () {
    Route::get('/{pibicindicacao_id}', [PibicIndicacaoController::class, 'page'])->name('pibicindicacao.page');
    Route::get('/inscricao/{pibicindicacao_id}', [PibicIndicacaoInscricaoController::class, 'create'])->name('pibicindicacao.inscricao.create')->middleware(['auth']);
    Route::post('/inscricao/{pibicindicacao_id}', [PibicIndicacaoInscricaoController::class, 'store'])->name('pibicindicacao.inscricao.store')->middleware(['auth']);
    Route::get('/lista-inscricao/{pibicindicacao_id}', [PibicIndicacaoInscricaoController::class, 'index'])->name('pibicindicacao.inscricao.index')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);
    Route::get('/pdf/{pibicindicacao_id}/{pi_inscricao_id}', [PibicIndicacaoInscricaoController::class, 'gerarPDF'])->name('pibicindicacao.inscricao.pdf');
    Route::get('/docshow/{diretorio}', [PibicIndicacaoInscricaoController::class, 'docshow'])->name('pibicindicacao.inscricao.docshow');
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

//Inscrições de Eventos -  VIEW CANDIDATOS SEMIC
Route::prefix('semic')->group(function () {
    Route::get('/{semic_id}', [SemicController::class, 'page'])->name('semic.page');
    Route::get('/inscricao/{semic_id}', [SemicInscricaoController::class, 'create'])->name('semic.inscricao.create')->middleware(['auth']);
    Route::post('/inscricao/{semic_id}', [SemicInscricaoController::class, 'store'])->name('semic.inscricao.store')->middleware(['auth']);
    Route::get('/lista-inscricao/{semic_id}', [SemicInscricaoController::class, 'index'])->name('semic.inscricao.index')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);
    Route::get('/pdf/{semic_id}/{semic_inscricao_id}', [SemicInscricaoController::class, 'gerarPDF'])->name('semic.inscricao.pdf')->middleware(['auth']);
    Route::get('/docshow/{diretorio}', [SemicInscricaoController::class, 'docshow'])->name('semic.inscricao.docshow')->middleware(['auth']);
    Route::get('/verinscricao/{semic_id}/{user_id}', [SemicInscricaoController::class, 'show'])->name('semic.inscricao.show')->middleware(['auth']);
});

//Inscrições de Eventos -  VIEW CANDIDATOS BATI
Route::prefix('bati')->group(function () {
    Route::get('/{bati_id}', [BatiController::class, 'page'])->name('bati.page');
    Route::get('/inscricao/{bati_id}', [BatiInscricaoController::class, 'create'])->name('bati.inscricao.create')->middleware(['auth']);
    Route::post('/inscricao/{bati_id}', [BatiInscricaoController::class, 'store'])->name('bati.inscricao.store')->middleware(['auth']);
    Route::get('/lista-inscricao/{bati_id}', [BatiInscricaoController::class, 'index'])->name('bati.inscricao.index')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);
    Route::get('/pdf/{bati_id}/{bati_inscricao_id}', [BatiInscricaoController::class, 'gerarPDF'])->name('bati.inscricao.pdf')->middleware(['auth']);
    Route::get('/docshow/{diretorio}', [BatiInscricaoController::class, 'docshow'])->name('bati.inscricao.docshow')->middleware(['auth']);
    Route::get('/verinscricao/{bati_id}/{user_id}', [BatiInscricaoController::class, 'show'])->name('bati.inscricao.show')->middleware(['auth']);
});


//Inscrições de Eventos -  VIEW CANDIDATOS SemicEvento
Route::prefix('semicevento')->group(function () {
    Route::get('/{semic_evento_id}', [SemicEventoController::class, 'page'])->name('semicevento.page');
    Route::get('/inscricao/{semic_evento_id}', [SemicEventoInscricaoController::class, 'create'])->name('semic.eventoinscricao.create')->middleware(['auth']);
    Route::post('/inscricao/{semic_evento_id}', [SemicEventoInscricaoController::class, 'store'])->name('semic.eventoinscricao.store')->middleware(['auth']);
    Route::get('/lista-inscricao/{semic_evento_id}/{tipo}', [SemicEventoInscricaoController::class, 'index'])->name('semic.eventoinscricao.index')->middleware(['check-role:Administrador|Coordenação de Pesquisa']);
    Route::get('/pdf/{semic_evento_id}/{semic_eventoinscricao_id}', [SemicEventoInscricaoController::class, 'gerarPDF'])->name('semic.eventoinscricao.pdf')->middleware(['auth']);
    Route::get('/docshow/{diretorio}', [SemicEventoInscricaoController::class, 'docshow'])->name('semic.eventoinscricao.docshow')->middleware(['auth']);
    Route::get('/verinscricao/{semic_evento_id}/{user_id}', [SemicEventoInscricaoController::class, 'show'])->name('semic.eventoinscricao.show')->middleware(['auth']);
});


Route::post('/getcursos', [CursoController::class, 'getCurso'])->name('getCurso');

Route::get('teste', function () {
    return view('pdf.primeirospassos');
});

Route::get('tela', function () {
    return view('tela');
});
