<?php

class ControladorEnfcon extends BaseController{




	public function agregarenfcon(){

	/*-- Funcion para Agregar vacunas --*/

		$datosenfcond= array(

			'cod_enf_Cond' => null,
			'tipo'=>Input::get('tipoenf'),
			'nombre'=>Input::get('enfcond'),
			'descripcion'=>Input::get('descripcion'),);


		$reglas = array(
			'nombre'=>'required|unique:enf_cond,nombre',
			);


		$validar=Validator::make($datosenfcond,$reglas);

		if($validar->fails()){

			$nombre=$datosenfcond['nombre'];
			DB::update(DB::raw("update enf_cond set habil = 1 where nombre = '$nombre'"));
			return Redirect::to('gestion/enfcond')
			->withErrors('Enfermedad o condicion Actualizada');

		} else{
$nombreenf=$datosenfcond['nombre'];
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Agregar Enfermedad o Condicion',
'cambio' =>$nombreenf,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);


			registrar::Guardarenfer($datosenfcond);
			return Redirect::to('gestion/enfcond')
			->withErrors('Enfermedad o condicion Actualizada');
		}





		
	}

/*-- Fin Funcion para Agregar vacunas --*/



	public function eliminarenfcon(){/*-- Funcion para eliminar vacunas --*/
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	

		$enfer=Input::get('enf');
		$total=count($enfer);
		
		var_dump($enfer);
		var_dump($total);

		for ($i="0"; $i<$total; $i++) {  
			$del_id = $enfer[$i]; 
			DB::update(DB::raw("update enf_cond set habil = 0 where cod_enf_Cond = '$del_id'"));


$antecedente=DB::table('enf_cond')->where('cod_enf_Cond', $del_id)->first();
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Eliminar Enfermedad o condicion',
'cambio' =>$antecedente->nombre,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);


		}
			return Redirect::to('gestion/enfcond')
			->withErrors('Enfermedad o condicion Deshabilitada'); 

		}

		/*-- Fin Funcion para eliminar vacunas --*/


		
	}



	?>

