<?php

class ControladorAntecedente extends BaseController{




public function agregarantecedente(){/*-- Funcion para Agregar vacunas --*/

$datosante= array(
'cod_antecedente' => null,
'nombre'=>Input::get('antecedente'),
'tipo'=>Input::get('tipoante'),
'tipoinfo'=>Input::get('tipoinfo'),
'habil'=>1,
);
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Agregar Antecedente',
'cambio' =>Input::get('antecedente'),
'fecha'=>$fecha,
);

	$reglas = array(
'nombre'=>'required|unique:antecedente,nombre',
);

	$validar=Validator::make($datosante,$reglas);




if($validar->fails()){
$tipo=$datosante['tipo'];
$tipoinfo=$datosante['tipoinfo'];
$nombre=$datosante['nombre'];

DB::update(DB::raw("update antecedente set habil = 1, tipo='$tipo', tipoinfo=$tipoinfo  where nombre = '$nombre'"));
	return Redirect::to('gestion/antecedente')
										->withErrors('Antecedente Actualizado');
} else{

	registrar::GuardarAntecedente($datosante);
	registrar::GuardarBitacora($bitacora);
	return Redirect::to('gestion/antecedente')
										->withErrors('Antecedente agregado');
}





	
}/*-- Fin Funcion para Agregar vacunas --*/



public function eliminarantecedente(){/*-- Funcion para eliminar vacunas --*/
$usuario=Auth::user()->username;	
$fecha= date('Y-m-d');
$ante=Input::get('ante');
$total=count($ante);

    for ($i="0"; $i<$total; $i++) {  
         $del_id = $ante[$i]; 
DB::update(DB::raw("update antecedente set habil = 0 where cod_antecedente = '$del_id'"));
$antecedente=DB::table('antecedente')->where('cod_antecedente', $del_id)->first();
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Eliminar Antecedente',
'cambio' =>$antecedente->nombre,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);}







	return Redirect::to('gestion/antecedente')
										->withErrors('Antecedente Deshabilitado'); 

}/*-- Fin Funcion para eliminar vacunas --*/


	
}



?>

