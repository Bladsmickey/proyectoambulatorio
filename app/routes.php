<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

    // Esta será nuestra ruta de bienvenida.

/*
Event::listen('illuminate.query', function($sql)
{
    var_dump($sql);
});

 */

Route::get('/ciudad/{id}', function($id)
{
  $cod_municipio = $id;
  $ciudades = Municipios::find($cod_municipio)->parroquia;

   return json_encode($ciudades);
});


Route::get('/municipios/{id}', function($id)
{
  $cod_estado = $id;
  $municipio = Estado::find($cod_estado)->municipio;

   return json_encode($municipio);
});


Route::get('/tipoante/{id}', function($id)
{
  $cod_antecedente = $id;
  $tipoante = Antecendente::find($cod_antecedente);

   return json_encode($tipoante);
});

Route::get('/cualvacuna/{id}', function($id)
{
  $cod_vacuna = $id;
  $tipovacu = DB::table('vacuna')->where('cod_vacuna', $cod_vacuna)->get();

   return json_encode($tipovacu);
});

Route::get('datatables', array('as'=>'datatables', 'uses'=>'HomeController@getDatatable'));

Route::get('/bitacoraajax/', function()
{
  $bitacora = DB::table('bitacora')->get();
   return json_encode($bitacora);
});



Route::filter('auth.admin', function()

{

  if (Auth::check() == false)

  {
    return Redirect::guest('login');

  }

});

Route::get('login', function()
{
 if(Auth::user()) {
  return Redirect::to('/');
}

return View::make('login');
});



Route::get('/', function()
{
  return View::make('hello');

})->before('auth');

Route::post('login', 'ControladorUsuarios@loguearUsu');
Route::post('login/crear', 'ControladorUsuarios@registrarUsu');
Route::get('logout', 'ControladorUsuarios@deslogearUsu');
Route::post('busqueda', 'ControladorBusqueda@BuscarPaciente');
Route::post('nuevo/paciente', 'ControladorPaciente@registrarPac');

Route::get('login/olvidar', function(){
  return View::make('olvidar');
});

Route::post('login/olvidar', 'ControladorUsuarios@recuperarUsu');

Route::get('cambiarcontra', function(){
  return View::make('cambiarcontra');
});
Route::post('cambiarcontra', 'ControladorUsuarios@cambiarContra');

//Antecedentes

Route::get('gestion/antecedente', function(){
  return View::make('antecedente');
})->before('auth');

Route::post('gestion/antecedente/agregar', 'ControladorAntecedente@agregarantecedente');
Route::post('gestion/antecedente/deshabilitar', 'ControladorAntecedente@eliminarantecedente');

Route::get('tabla', function(){
  return View::make('tabla');
})->before('auth');


//vacunas

Route::get('gestion/vacuna', function(){
  return View::make('vacunas');
})->before('auth');

Route::post('gestion/vacuna/agregar', 'ControladorVacuna@agregarvacuna');
Route::post('gestion/vacuna/deshabilitar', 'ControladorVacuna@eliminarvacu');




// Enfermedades o condiciones

Route::get('gestion/enfcond', function(){
  return View::make('enfcond');
})->before('auth');
Route::post('gestion/enfcond/agregar', 'ControladorEnfcon@agregarenfcon');
Route::post('gestion/enfcond/deshabilitar', 'ControladorEnfcon@eliminarenfcon');


// reporte programa preventivo
Route::get('reportes/reporteprogpre', function(){
  return View::make('reporteprogpre');
})->before('auth');

    // Medicamentos



Route::get('gestion/medicamentos', function(){
  return View::make('medicamentos');
})->before('auth');
Route::post('gestion/medicamentos/agregar', 'ControladorMedicamentos@agregarmedicamentos');
Route::post('gestion/medicamentos/deshabilitar', 'ControladorMedicamentos@eliminarmedicamentos');



Route::get('nuevo/paciente', function(){
  return View::make('Histclinic');
})->before('auth');

Route::get('reportes/ProgPre', function(){
  return View::make('ProgPre');
})->before('auth');

Route::get('reportes/segusu', function(){
  return View::make('segusu');
})->before('auth');



Route::get('reportes/conmen', function(){
  return View::make('ConsoMensual');
})->before('auth');


Route::post('busqueda/vacunasusu', 'ControladorBusqueda@BuscarVacunas');

Route::get('login/crear', function(){
  return View::make('crearusu');
});

Route::post('busqueda/vacunasusu/agregar', 'ControladorBusqueda@AgregarVacunas');


Route::post('busqueda/antecedenteusu', 'ControladorBusqueda@BuscarAnte');
Route::post('busqueda/antecedenteusu/agregar', 'ControladorBusqueda@AgregarAnte');

Route::post('busqueda/histclinicusu', 'ControladorBusqueda@BuscarConsulta');
Route::post('busqueda/prenatal', 'ControladorBusqueda@BuscarPrenatal');
Route::post('busqueda/prenatal/agregar', 'ControladorBusqueda@AgregarPrenatal');
Route::post('reportes/ProgPre/generar', 'ControladorReportes@GenerarProgPre');
Route::post('busqueda/paciente/pacienteespe', 'ControladorBusqueda@BuscarPacienteEspe');



Route::get('acercade', function(){
  return View::make('acercade');
});

Route::post('deshabilitarusu', 'ControladorUsuarios@deshabilitarUsu');
Route::post('habilitarusu', 'ControladorUsuarios@habilitarUsu');

Route::post('bdd/restaurar', 'ControladorReportes@resturarBDD');
Route::get('bdd', 'ControladorReportes@relpaldoBDD');


Route::post('actualizarusu', 'ControladorPaciente@ActualizarPaciente');

Route::post('paciente/actualizar', 'ControladorPaciente@ActualizarPaciente');



Route::get('basedd', function(){
  return View::make('basedd');
});


Route::get('usuario/deshabilitar', function(){
  return View::make('desusuario');
});

Route::get('bitacora', function(){
  return View::make('bitacora');
});