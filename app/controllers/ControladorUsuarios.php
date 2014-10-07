<?php

class ControladorUsuarios extends BaseController{

	public function recuperarUsu(){
		$datoscontrasena= array(
           'username' => Input::get('username'),
           'preguntasecreta' => Input::get('pregunta'),
           'respuesa' => Input::get('respuesta'),
			);
	$username=$datoscontrasena['username'];

$hola = DB::table('usuarios')->where('username',$username)->first();

if($datoscontrasena['preguntasecreta']==$hola->preguntasecreta){
if($datoscontrasena['respuesa']==$hola->respuesta){return View::make('cambiarcontra')->with('username', '$username');}else{return Redirect::to('login/olvidar')
                            ->with('Mensaje_error', 'Pregunta o respuesta incorrecta'); }
}else{
	return Redirect::to('login/olvidar')
                            ->with('Mensaje_error', 'Usuario no encontrado o pregunta incorrecta');
                        }
	}

	public function cambiarContra(){
$datoscambio= array(
'username' => Input::get('username'),
'password' => Input::get('password'),
'cpassword' => Input::get('cpassword'),
);
$username=$datoscambio['username'];
	if($datoscambio['password'] == $datoscambio['cpassword']){
$contrahash=Hash::make($datoscambio['password']);

DB::table('usuarios')->where('username', $username )->update(array('password'=>$contrahash));
return Redirect::to('login')
->with('Mensaje_error', 'Contraseña actualizada exitosamente');
	}else{return Redirect::to('cambiarcontra')
	->with(array('username' => $username,'Mensaje_error' => 'Las contraseñas no coinciden',));}
 }


	public function registrarUsu(){
$datosregistro = array(
	'id' => null, 
	'nombres' => Input::get('nombres'),
	'apellidos' => Input::get('apellidos'),
	'username' => Input::get('username'),
	'password' => Input::get('password'),
	'preguntasecreta' => Input::get('pregunta'),
	'respuesta' => Input::get('respuesta'),
	'tipo' => Input::get('nivelusu'),
	'remember_token' => Input::get('_token'),
	);

$datosregistrovali = array(
	'id' => null, 
	'nombres' => Input::get('nombres'),
	'apellidos' => Input::get('apellidos'),
	'username' => Input::get('username'),
	'password' => Input::get('password'),
	'cpassword' => Input::get('cpassword'),
	'remember_token' => Input::get('_token'),
	);

$reglas = array(

	'nombres' =>   'required',
	'apellidos' => 'required',
	'username' =>  'required|unique:usuarios,username',
	'password' =>  'required|min:6',
	'cpassword' => 'required|min:6|same:password',

	);

$messages = array(
    'required' => 'El campo :attribute es obligatorio.',
    'same'    => 'Contraseñas no coinciden.',
);


$validar=Validator::make($datosregistrovali,$reglas,$messages);

if($validar->fails()){

	return Redirect::to('login/crear')
                            ->withErrors($validar->messages());

}else{


$cambioso=$datosregistro['username'];
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Registro de un nuevo usuario',
'cambio' =>$cambioso,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);


 $datosregistro['password']= Hash::make($datosregistro['password']);
	registrar::GuardarDatos($datosregistro);
	return Redirect::to('login');
}



}

	public function loguearUsu(){

		$datosdeusu = array(
			'username' => Input::get('username'),
			'password' => Input::get('contrasena'),
				            );
$username=$datosdeusu['username'];
$users = DB::table('usuarios')->where('username', $username)->first();

if($users->habil == 0){
return Redirect::to('login')
					->with('Mensaje_error', 'Datos de sesion incorrectos o usuario deshabilitado');
}

if(Auth::attempt($datosdeusu)){
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Inicio de Sesion',
'cambio' =>$usuario,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);
return Redirect::to('/');




}
	return Redirect::to('login')
					->with('Mensaje_error', 'Datos de sesion incorrectos o usuario deshabilitado');
}


	public function deslogearUsu(){
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Cierre de sesion',
'cambio' =>$usuario,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);
		Auth::logout();
        return Redirect::to('login')
                    ->with('Mensaje_error', 'Tu sesión ha sido cerrada.');
	}


public function deshabilitarUsu(){
$usu=Input::get('usu');
$total=count($usu);
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	

var_dump($usu);
var_dump($total);

    for ($i="0"; $i<$total; $i++) {
         $del_id = $usu[$i];
DB::update(DB::raw("update usuarios set habil = 0 where username = '$del_id'"));


$antecedente=DB::table('usuarios')->where('username', $del_id)->first();
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Deshabilitar Usuario',
'cambio' =>$antecedente->username,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);


}
	return Redirect::to('usuario/deshabilitar')
										->withErrors('Usuario Deshabilitado');
	}


	public function habilitarUsu(){

$usu=Input::get('usu');
$total=count($usu);
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	
var_dump($usu);
var_dump($total);

    for ($i="0"; $i<$total; $i++) {
         $del_id = $usu[$i];
DB::update(DB::raw("update usuarios set habil = 1 where username = '$del_id'"));

$antecedente=DB::table('usuarios')->where('username', $del_id)->first();
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Habilitar Usuario',
'cambio' =>$antecedente->username,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);


}
	return Redirect::to('usuario/deshabilitar')
										->withErrors('Usuario Habilitado');


	}


}

?>