<?php

class ControladorVacuna extends BaseController{




public function agregarvacuna(){/*-- Funcion para Agregar vacunas --*/

	$datosvacuna= array(

'cod_vacuna' => null,
'nombre'=>Input::get('vacuna'),
'tipo'=>Input::get('tipovacu'),
'descripcion'=>Input::get('descripcion'),
'dosis_max'	=>Input::get('dosis'),
'edad_apli' =>Input::get('edadapli')." ".Input::get('edadapliespe'),
'dosificacion'=>Input::get('dosificacion')." CC",
'intervalo_dosis'=>Input::get('interdosis')." Semanas",
'refuerzo'=>Input::get('refuerzo'),

);
	$reglas = array(
'nombre'=>'required|unique:vacuna,nombre',
);

	$validar=Validator::make($datosvacuna,$reglas);




if($validar->fails()){
$dosis=$datosvacuna['dosis_max'];
$nombre=$datosvacuna['nombre'];

	DB::update(DB::raw("update vacuna set habil = 1, dosis_max=$dosis where nombre = '$nombre'"));
	return Redirect::to('gestion/vacuna')
										->withErrors('Vacuna Actualizada');
} else{

$usuario=Auth::user()->username;	
$fecha= date('Y-m-d');
$antecedente=$datosvacuna['nombre'];
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Agregar Vacuna',
'cambio' =>$antecedente,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);

	registrar::GuardarVacuna($datosvacuna);
	return Redirect::to('gestion/vacuna')
										->withErrors('Vacuna agregada');
}





	
}/*-- Fin Funcion para Agregar vacunas --*/



public function eliminarvacu(){/*-- Funcion para eliminar vacunas --*/


$vacunas=Input::get('vacu');
$total=count($vacunas);
 $fecha= date('Y-m-d');
$usuario=Auth::user()->username;	
var_dump($vacunas);
var_dump($total);

    for ($i="0"; $i<$total; $i++) {  
         $del_id = $vacunas[$i]; 
DB::update(DB::raw("update vacuna set habil = 0 where cod_vacuna = '$del_id'"));

$antecedente=DB::table('vacuna')->where('cod_vacuna', $del_id)->first();
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Deshabilitar Vacuna',
'cambio' =>$antecedente->nombre,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);


}
	return Redirect::to('gestion/vacuna')
										->withErrors('Vacuna Deshabilitada'); 

}/*-- Fin Funcion para eliminar vacunas --*/


	
}



?>

