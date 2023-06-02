<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Export\ExportsController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\GrandeAreaController;
use App\Http\Controllers\ModalidadeBolsaController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PP_IndicacaoBolsistas\PP_IndicacaoBolsistasController;
use App\Http\Controllers\PP_IndicacaoBolsistas\PP_IndicacaoBolsistasInscricaoController;
use App\Http\Controllers\Semic\SemicController;
use App\Http\Controllers\PrimeirosPassos\PrimeiroPassoController;
use App\Http\Controllers\PrimeirosPassos\PrimeirosPassosInscricaoController;
use App\Http\Controllers\SubAreaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ZenixadminController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::prefix('tema')->group(function () {
    Route::get('/',             [ZenixadminController::class, 'page_login'])->name('teste');
    Route::get('/index',        [ZenixadminController::class, 'dashboard_1']);
    Route::get('/index-2',      [ZenixadminController::class, 'dashboard_2']);
    Route::get('/coin-details', [ZenixadminController::class, 'coin_details']);
    Route::get('/portofolio',   [ZenixadminController::class, 'portofolio']);
    Route::get('/market-capital', [ZenixadminController::class, 'market_capital']);
    Route::get('/tranasactions', [ZenixadminController::class, 'tranasactions']);
    Route::get('/my-wallets',   [ZenixadminController::class, 'my_wallets']);
    Route::get('/app-profile',  [ZenixadminController::class, 'app_profile']);
    Route::get('/post-details', [ZenixadminController::class, 'post_details']);
    Route::get('/page-chat',    [ZenixadminController::class, 'page_chat']);
    Route::get('/project-list', [ZenixadminController::class, 'project_list']);
    Route::get('/project-card', [ZenixadminController::class, 'project_card']);
    Route::get('/contact-list', [ZenixadminController::class, 'contact_list']);
    Route::get('/contact-card', [ZenixadminController::class, 'contact_card']);
    Route::get('/email-compose', [ZenixadminController::class, 'email_compose']);
    Route::get('/email-inbox',  [ZenixadminController::class, 'email_inbox']);
    Route::get('/email-read',   [ZenixadminController::class, 'email_read']);
    Route::get('/app-calender', [ZenixadminController::class, 'app_calender']);
    Route::get('/ecom-checkout', [ZenixadminController::class, 'ecom_checkout']);
    Route::get('/ecom-customers', [ZenixadminController::class, 'ecom_customers']);
    Route::get('/ecom-invoice', [ZenixadminController::class, 'ecom_invoice']);
    Route::get('/ecom-product-detail', [ZenixadminController::class, 'ecom_product_detail']);
    Route::get('/ecom-product-grid', [ZenixadminController::class, 'ecom_product_grid']);
    Route::get('/ecom-product-list', [ZenixadminController::class, 'ecom_product_list']);
    Route::get('/ecom-product-order', [ZenixadminController::class, 'ecom_product_order']);
    Route::get('/chart-chartist', [ZenixadminController::class, 'chart_chartist']);
    Route::get('/chart-chartjs', [ZenixadminController::class, 'chart_chartjs']);
    Route::get('/chart-flot',   [ZenixadminController::class, 'chart_flot']);
    Route::get('/chart-morris', [ZenixadminController::class, 'chart_morris']);
    Route::get('/chart-peity',  [ZenixadminController::class, 'chart_peity']);
    Route::get('/chart-sparkline', [ZenixadminController::class, 'chart_sparkline']);
    Route::get('/ui-accordion', [ZenixadminController::class, 'ui_accordion']);
    Route::get('/ui-alert',     [ZenixadminController::class, 'ui_alert']);
    Route::get('/ui-badge',     [ZenixadminController::class, 'ui_badge']);
    Route::get('/ui-button',    [ZenixadminController::class, 'ui_button']);
    Route::get('/ui-button-group', [ZenixadminController::class, 'ui_button_group']);
    Route::get('/ui-card',      [ZenixadminController::class, 'ui_card']);
    Route::get('/ui-carousel',  [ZenixadminController::class, 'ui_carousel']);
    Route::get('/ui-dropdown',  [ZenixadminController::class, 'ui_dropdown']);
    Route::get('/ui-grid',      [ZenixadminController::class, 'ui_grid']);
    Route::get('/ui-list-group', [ZenixadminController::class, 'ui_list_group']);
    Route::get('/ui-media-object', [ZenixadminController::class, 'ui_media_object']);
    Route::get('/ui-modal',     [ZenixadminController::class, 'ui_modal']);
    Route::get('/ui-pagination', [ZenixadminController::class, 'ui_pagination']);
    Route::get('/ui-popover',   [ZenixadminController::class, 'ui_popover']);
    Route::get('/ui-progressbar', [ZenixadminController::class, 'ui_progressbar']);
    Route::get('/ui-tab',       [ZenixadminController::class, 'ui_tab']);
    Route::get('/ui-typography', [ZenixadminController::class, 'ui_typography']);
    Route::get('/uc-nestable',  [ZenixadminController::class, 'uc_nestable']);
    Route::get('/uc-lightgallery', [ZenixadminController::class, 'uc_lightgallery']);
    Route::get('/uc-noui-slider', [ZenixadminController::class, 'uc_noui_slider']);
    Route::get('/uc-select2',   [ZenixadminController::class, 'uc_select2']);
    Route::get('/uc-sweetalert', [ZenixadminController::class, 'uc_sweetalert']);
    Route::get('/uc-toastr',    [ZenixadminController::class, 'uc_toastr']);
    Route::get('/map-jqvmap',   [ZenixadminController::class, 'map_jqvmap']);
    Route::get('/widget-basic', [ZenixadminController::class, 'widget_basic']);
    Route::get('/form-editor-summernote', [ZenixadminController::class, 'form_editor_summernote']);
    Route::get('/form-element', [ZenixadminController::class, 'form_element']);
    Route::get('/form-pickers', [ZenixadminController::class, 'form_pickers']);
    Route::get('/form-validation-jquery', [ZenixadminController::class, 'form_validation_jquery']);
    Route::get('/form-wizard',  [ZenixadminController::class, 'form_wizard']);
    Route::get('/table-bootstrap-basic', [ZenixadminController::class, 'table_bootstrap_basic']);
    Route::get('/table-datatable-basic', [ZenixadminController::class, 'table_datatable_basic']);
    Route::get('/page-error-400', [ZenixadminController::class, 'page_error_400']);
    Route::get('/page-error-403', [ZenixadminController::class, 'page_error_403']);
    Route::get('/page-error-404', [ZenixadminController::class, 'page_error_404']);
    Route::get('/page-error-500', [ZenixadminController::class, 'page_error_500']);
    Route::get('/page-error-503', [ZenixadminController::class, 'page_error_503']);
    Route::get('/page-forgot-password', [ZenixadminController::class, 'page_forgot_password']);
    Route::get('/page-lock-screen', [ZenixadminController::class, 'page_lock_screen']);
    Route::get('/page-login',   [ZenixadminController::class, 'page_login']);

    Route::get('/page-register', [ZenixadminController::class, 'page_register']);
});


Route::post('login-eventos', [LoginController::class, 'loginEvento'])->name('login.eventos');
Route::post('logout-eventos', [LoginController::class, 'logoutEvento'])->name('logout.eventos');
Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/areaajax', [App\Http\Controllers\HomeController::class, 'indexajax'])->name('areaajax');
});

// Route::get('/', [App\Http\Controllers\LoginController::class, 'index'])->name('login.index');
// Route::post('/', [App\Http\Controllers\LoginController::class, 'store'])->name('login.store');
// Route::post('/logout', [App\Http\Controllers\LoginController::class, 'destroy'])->name('login.destroy');

Route::post('login-servidor', [ApiController::class, 'login'])->name('login-professor');
Route::post('login-servidor', [ApiController::class, 'login'])->name('login-professor');



Route::prefix('admin')->group(function () {

    //Semic
    Route::resource('semic', SemicController::class);

    //PrimeiroPassos
    Route::resource('primeiropasso', PrimeiroPassoController::class)->middleware(['check-role:Coordenação']);

    //GrandeArea
    Route::resource('grandearea', GrandeAreaController::class);

    //Perfil
    Route::resource('perfil', PerfilController::class);

    //SubArea
    Route::resource('subarea', SubAreaController::class);

    //PrimeirosPassos Inscricão
    Route::get('/primeirospassos/inscritos', [ExportsController::class, 'primeirosPassosInscritos'])->name('lista.inscritos');

     //GrandeArea
     Route::resource('grandearea', GrandeAreaController::class);
    //User
    Route::resource('users', UserController::class);

     //ModalidadeBolsa
     Route::resource('modalidadebolsa', ModalidadeBolsaController::class);   

    //PrimeirosPassos Indicacao Bolsistas
    Route::resource('pp-indicacao-bolsistas', PP_IndicacaoBolsistasController::class);
});






Route::prefix('site')->group(function () {

    //Semic
    //Route::get('/semic', [SemicController::class, 'site'])->name('site.semic');

    //PrimeiroPassos
    Route::get('/primeiropasso', [PrimeiroPassoController::class, 'site'])->name('site.primeiropasso');


    //PrimeirosPassos Indicacao Bolsistas
    Route::get('/pp-indicacao-bolsistas', [PP_IndicacaoBolsistasController::class, 'site'])->name('site.pp-indicacao-bolsistas');
});

//Inscrições de Eventos -  VIEW CANDIDATOS PRIMEIROS PASSOS
Route::prefix('primeirospassos')->group(function () {
    Route::get('/{primeiropasso_id}', [PrimeiroPassoController::class, 'page'])->name('primeirospassos.page');
    Route::get('/inscricao/{primeiropasso}', [PrimeirosPassosInscricaoController::class, 'create'])->name('primeirospassos.inscricao.create');
    Route::post('/inscricao', [PrimeirosPassosInscricaoController::class, 'store'])->name('primeirospassos.inscricao.store');
    Route::get('/lista-inscricao/{primeiropasso_id}', [PrimeirosPassosInscricaoController::class, 'index'])->name('primeirospassos.inscricao.index');
    Route::get('/espelho/{primeiropasso_id}/{passos_inscricao_id}', [PrimeirosPassosInscricaoController::class, 'espelho'])->name('primeirospassos.inscricao.espelho');
    Route::get('/pdf/{primeiropasso_id}/{passos_inscricao_id}', [PrimeirosPassosInscricaoController::class, 'gerarPDF'])->name('primeirospassos.inscricao.pdf');
    Route::get('/docshow/{diretorio}', [PrimeirosPassosInscricaoController::class, 'docshow'])->name('primeirospassos.inscricao.docshow');
});

//Inscrições de Eventos -  VIEW CANDIDATOS PP_IndicacaoBolsistas
Route::prefix('pp-indicacao-bolsistas')->group(function () {
    Route::get('/{pp_indicacao_bolsista_id}', [PP_IndicacaoBolsistasController::class, 'page'])->name('pp-i-bolsistas.page');
    Route::get('/inscricao/{pp_indicacao_bolsista_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'create'])->name('pp-i-bolsistas-inscricao.create');
    Route::post('/inscricao/{pp_indicacao_bolsista_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'store'])->name('pp-i-bolsistas-inscricao.store');
    Route::get('/lista-inscricao/{pp_indicacao_bolsista_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'index'])->name('pp-i-bolsistas-inscricao.index');
    Route::get('/espelho/{pp_indicacao_bolsista_id}/{pp_i_bolsista_inscricao_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'espelho'])->name('pp-i-bolsistas-inscricao.espelho');
    Route::get('/pdf/{pp_indicacao_bolsista_id}/{pp_i_bolsista_inscricao_id}', [PP_IndicacaoBolsistasInscricaoController::class, 'gerarPDF'])->name('pp-i-bolsistas-inscricao.pdf');
});

Route::get('teste', function () {
    return view('pdf.primeirospassos');
});

Route::get('tela', function () {
    return view('tela');
});

