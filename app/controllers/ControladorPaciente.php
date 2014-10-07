<?php

class ControladorPaciente extends BaseController{

	public function municipio(){
    $id = Input::get('id');
    $municipio = DB::table('municipio')->where('id_estado', $id)->get();
    $data = array('user' => $user);

    return View::make('details', $data);
	}

	public function ActualizarPaciente(){
	$cedula=Input::get('cedula');
	$actualizar=Input::get('actualizar');
   if(isset($actualizar)){

$datospaciente = array(
	'ced_paciente' => Input::get('cedula'), 
	'nombres' => Input::get('nombres'),
	'apellidos' => Input::get('apellidos'),
	'ocupacion' => Input::get('ocupacion'),
	'sexo' => Input::get('sexo'),
	'fecha_nacim' => Input::get('fechanac'),
	'cod_etnia' => Input::get('etnia'),
	'edo_civil' => Input::get('conyugal'),
	'nivel_academico' => Input::get('niveledu'),
	'telf' => Input::get('codarea')."-".Input::get('telefcel'),
	'nacionalidad' => Input::get('nacionalidad'),
	'edad' => Input::get('edad'),
	);

$direcciona = array(
'cod_direc_a'	=> Input::get('cedula'),
'estado'=> Input::get('estresi'),
'municipio'	=> Input::get('municresi'),
'parroquia'=> Input::get('parraresi'),
'codpostal'=> Input::get('codpostal'),
'descripcion'=> Input::get('urb')." ".Input::get('av')." #".Input::get('casa')." Piso: ".Input::get('piso')." Pto Referencia: ".Input::get('ptoref'), 
);

$cambioso=$datospaciente['nombres']." ".$datospaciente['apellidos'];
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Actualizar Datos del paciente',
'cambio' =>$cambioso,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);
registrar::ActualizarPaciente($datospaciente);
registrar::ActualizarPacientedirea($direcciona);
return View::make('busquedaespe')->with('cedula', $cedula);
}
   	else{
   		return View::make('actuausu')->with('cedula', $cedula);
   	} 

	}


public function registrarPac(){

$datospaciente = array(
	'ced_paciente' => Input::get('cedula'), 
	'nombres' => Input::get('nombres'),
	'apellidos' => Input::get('apellidos'),
	'ocupacion' => Input::get('ocupacion'),
	'sexo' => Input::get('sexo'),
	'fecha_nacim' => Input::get('fechanac'),
	'cod_etnia' => Input::get('etnia'),
	'edo_civil' => Input::get('conyugal'),
	'nivel_academico' => Input::get('niveledu'),
	'telf' => Input::get('codarea')."-".Input::get('telefcel'),
	'nacionalidad' => Input::get('nacionalidad'),
	'edad' => Input::get('edad'),
	);

$direcciona = array(

'cod_direc_a'	=> Input::get('cedula'), 
'estado'=> Input::get('estresi'), 
'municipio'	=> Input::get('municresi'), 
'parroquia'=> Input::get('parraresi'), 
'codpostal'=> Input::get('codpostal'), 
'descripcion'=> Input::get('urb')." ".Input::get('av')." #".Input::get('casa')." Piso: ".Input::get('piso')." Pto Referencia: ".Input::get('ptoref'), 
);


$direccionn = array(

'cod_direccion_n'	=> Input::get('cedula'), 
'estado'=> Input::get('estnac'), 
'municipio'	=> Input::get('municnac'), 
'parroquia'=> Input::get('ciudadnac'), 
'descripcion'=> Input::get('paisnac'), 
);


$cambioso=$datospaciente['nombres']." ".$datospaciente['apellidos'];
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Registrar nuevo paciente',
'cambio' =>$cambioso,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);
registrar::GuardarPaciente($datospaciente);
registrar::GuardarPacientedirea($direcciona);
registrar::GuardarPacientediren($direccionn);

return View::make('busqueda')->with('cedula', '$id');


}	

}

?>
