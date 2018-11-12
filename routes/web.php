<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\PacienteController;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', ['uses' => 'Controller@dashboard'])->name('dashboard');//->middleware('Autorizador');



//Route::get('/dashboard' , 'Controller@dashboard')->name('dashboard');
Route::post('/teste', 'Controller@dashboard')->name('teste');


/**         Rotas Relacionadas a autenticação
 * ========================================================================================
 *  Admin
 *  Usuario comuns .. secretaria e medico
 */

/**     Rotas Admin
 * =============================================================
 */



/** Rota redirecionar quando autenticado */
//Route::get('/',['uses' => 'Controller@home'])->middleware('autorizador')->name('home');
//Route::get('/home','Controller@home')->middleware('autorizador')->name('home');


/** Rota redirecionar quando não autenticado */
//Route::get('/', 'LoginController@formCad')->name('formulario');

/** Rota para enviar as infos da requisição para autenticação no method login */
//Route::post('/login','LoginController@login');
Route::get('/sair', 'LoginController@logout')->name('login.logout');


//Route::get('/pacientes' , 'PacienteController@listar')->middleware('autorizador');





/**=========================================================================== *
 * Rotas ara autenticação,
 * Definindo Rota "/login" como("as") 'user.login'
 * direcionando pro metodo login em controller.
 * =========================================================================== *
 */
Route::get('/login', ['uses' => 'LoginController@formLogin']);
Route::post("/login", ['as' => 'user.login', 'uses' => 'LoginController@login']);



//Route::get('/cad' , 'LoginController@cad');


/**             ROTAS REFENTE A CLIENTES - RAFAEL ALVARENGA
 * ================================================================================*
 *
 *
 *
 *
 *
 * =================================================================================*
 */

Route::prefix('pacientes')->middleware('Autorizador')->group(function () { //->middleware('Autorizador')-
  Route::get('listar'       , 'PacienteController@listar')->name(   'paciente.listar' );
  Route::get('novo'         , 'PacienteController@novo')->name(     'paciente.novo'   );
  Route::post('create'      , 'PacienteController@create')->name(   'paciente.create' );
  Route::get('editar/{id}'  , 'PacienteController@edit')->name(     'paciente.editar' );
  Route::put('update/{id}'  , 'PacienteController@update')->name(   'paciente.update' );
  Route::get('excluir/{id}' , 'PacienteController@destroy')->name(  'paciente.excluir');
  Route::get('index'        , 'PacienteController@indexjs')->name(  'paciente.js'     );
  Route::get('json'         , 'PacienteController@indexjson')->name('paciente.json'   );
});


//Route::resource('/pacientes', 'PacienteController');

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('funcionario')->middleware('Autorizador')->group(function () { //->middleware('Autorizador')->

  Route::get('cad'            , 'FuncionarioController@novo')->name(        'funcionario.novo'      );
  Route::get('listar'         , 'FuncionarioController@listar')->name(      'funcionario.listar'    );
  Route::get('excluir/{id}'   , 'FuncionarioController@destroy')->name(     'funcionario.excluir'   );
  Route::post('create'        , 'FuncionarioController@create')->name(      'funcionario.create'    );
  Route::get('editar/{id}'    , 'FuncionarioController@edit')->name(        'funcionario.editar'    );
  Route::put('update/{id}'    , 'FuncionarioController@update')->name(      'funcionario.update'     );
  Route::post('medico/create' , 'FuncionarioController@Medicocreate')->name('medico.create'         );
  Route::get('medico/cad'     , 'FuncionarioController@novoM')->name(       'medico.novo'           );
  Route::get('excluir/{id}'   , 'FuncionarioController@destroy')->name(     'funcionario.excluir'   );



});

/*Route::prefix('medico')->middleware('Autorizador')->group(function(){

Route::post('create', 'FuncionarioController@create')->name('user.create');;


})*/


Route::prefix('user')->middleware('Autorizador')->group(function () {
  Route::get('novo', 'UserController@novo')->name('user.novo');
  Route::post('create', 'UserController@create')->name('user.create');;



});

