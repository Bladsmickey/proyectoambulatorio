<?php

class ControladorMedicamentos extends BaseController{


	public function agregarmedicamentos(){

	/*-- Funcion para Agregar vacunas --*/

		$datosmed= array(

			'cod_medicamento' => null,
			'tipo'=>Input::get('tipomed'),
			'nombre'=>Input::get('medicamento'),
			'descripcion'=>Input::get('descripcion'),);
		$reglas = array(
			'nombre'=>'required|unique:enf_cond,nombre',
			);


		$validar=Validator::make($datosmed,$reglas);

		if($validar->fails()){
			$nombre=$datosmed['nombre'];
			DB::update(DB::raw("update medicamento set habil = 1 where nombre = '$nombre'"));
			return Redirect::to('gestion/medicamentos')
			->withErrors('Medicamento Actualizado');

		} else{


$nombremed=$datosmed['nombre'];
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Agregar Medicamente',
'cambio' =>$nombremed,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);

			registrar::GuardarMed($datosmed);
			return Redirect::to('gestion/medicamentos')
			->withErrors('Medicamento Actualizado');
		}





		
	}

/*-- Fin Funcion para Agregar vacunas --*/
	public function eliminarmedicamentos(){/*-- Funcion para eliminar vacunas --*/


		$medi=Input::get('med');
		$total=count($medi);
		$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	
		var_dump($medi);
		var_dump($total);

		for ($i="0"; $i<$total; $i++) {  
			$del_id = $medi[$i]; 
			DB::update(DB::raw("update medicamento set habil = 0 where cod_medicamento = '$del_id'"));

$antecedente=DB::table('medicamento')->where('cod_medicamento', $del_id)->first();
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Eliminar Medicamente',
'cambio' =>$antecedente->nombre,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);

		}
			return Redirect::to('gestion/medicamentos')
			->withErrors('Medicamento Deshabilitado'); 

		}

		/*-- Fin Funcion para eliminar vacunas --*/
}

	?>

