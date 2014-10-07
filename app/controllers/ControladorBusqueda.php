<?php

class ControladorBusqueda extends BaseController{


public function BuscarPaciente(){
$id=Input::get('cedula');
return View::make('busqueda')->with('cedula', '$id');
}

public function BuscarPacienteEspe(){
$id=Input::get('cedula');
return View::make('busquedaespe')->with('cedula', '$id');
}

public function BuscarVacunas(){
	$id=Input::get('cedula');
	return View::make('vacunasusu')->with('cedula', '$id');
}


public function BuscarAnte(){
	$id=Input::get('cedula');
	return View::make('antecedenteusu')->with('cedula', '$id');
}

public function BuscarConsulta(){
	$id=Input::get('cedula');
	return View::make('consultmedicusu')->with('cedula', '$id');
}

public function BuscarPrenatal(){
$id=Input::get('cedula');
return View::make('prenatal')->with('ced_paciente', '$id');
}




public function AgregarAnte(){

	if(Input::get('descrip')==''){$descrip="null";}else{$descrip=Input::get('descrip');}

$datosante= array(
			'cod_antec_x_pac' => null,
			'cod_antec_paciente'=>Input::get('cedula'),
			'descripcion'=>$descrip,
			'cod_antecedente'=>Input::get('antecedente'),
			);
$id=$datosante['cod_antec_paciente'];

$antecedente=DB::table('paciente')->where('ced_paciente', $id)->first();
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Actualizar Antecedente',
'cambio' =>$antecedente->nombres." ".$antecedente->apellidos,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);
registrar::GuardarUsuAnte($datosante);
			return View::make('antecedenteusu')->with('cedula', '$id')
			->withErrors('Antecedente Agregado');
}


public function AgregarVacunas(){
	if(Input::get('fechaproxi')==NULL){
		$fecharefuerzo="0000-00-00";
	}else{
		$fecharefuerzo=Input::get('fechaproxi');
	}
$datosvacu= array(
			'cod_vac_x_pac' => null,
			'cod_vacuna'=>Input::get('vacuna'),
			'cod_paciente'=>Input::get('cedula'),
			'fecha'=>Input::get('fecha'),
			'fecha_refuerzo'=>$fecharefuerzo,
			);

$id=Input::get('cedula');



$antecedente=DB::table('paciente')->where('ced_paciente', $id)->first();
$nombre=$antecedente->nombres." ".$antecedente->apellidos;
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;

$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Actualizar Vacuna',
'cambio' =>$nombre,
'fecha'=>$fecha,
);




registrar::GuardarBitacora($bitacora);


	registrar::GuardarUsuVacu($datosvacu);
	unset($datosvacu);
			return View::make('vacunasusu')->with('cedula', '$id')
			->withErrors('Vacuna agregada'); 
}



public function AgregarPrenatal(){

$fecha=date('Y-m-d');
$medicinas=Input::get('medicinas');
$totalmed=count($medicinas);



if(Input::get('enferespe')==null){$enferespe="No aplica";}else{$enferespe=Input::get('enferespe');}
if(Input::get('fechahep')==null){$fechahep="0000-00-00";}else{$fechahep=Input::get('fechahep');}
if(Input::get('fechaantihep')==null){$fechaantihep="0000-00-00";}else{$fechaantihep=Input::get('fechaantihep');}
if(Input::get('fechasanguinea')==null){$fechasanguinea="0000-00-00";}else{$fechasanguinea=Input::get('fechasanguinea');}
if(Input::get('tipodrogas')==null){$tipodrogas="No aplica";}else{$tipodrogas=Input::get('tipodrogas');}
if(Input::get('tipopreser')==null){$tipopreser="No aplica";}else{$tipopreser=Input::get('tipopreser');}

$datospre= array(
			'cod_prenatal' => null,
			'fpp'=>Input::get('fpp'),
			'nro_gesta'=>Input::get('numgesta'),
			'fur'=>Input::get('fum'),
			'nmr_parto'=>Input::get('numparto'),
			'nmr_aborto'=>Input::get('numabortos'),
			'nmr_hijos'=>Input::get('numhijos'),
			'edad_uh'=>Input::get('edaduhijo'),
			'edad_irs'=>Input::get('eirs'),
			'sem_gest'=>Input::get('semgesta'),
			'control_pre'=>Input::get('controlpre'),
			'enf_sex'=>Input::get('enfer'),
			'enf_sex_espef'=>$enferespe,
			'hepatitis'=>Input::get('vachep'),
			'hep_fecha'=>$fechahep,
			'vac_hep'=>Input::get('vacantihep'),
			'vac_hep_fecha'=>$fechaantihep,
			'tranf_sang'=>Input::get('sanguinea'),
			'tranf_sang_fecha'=>$fechasanguinea,
			'drogas'=>Input::get('drogas'),
			'drogas_tipo'=>$tipodrogas,
			'parejafija'=>Input::get('parejafija'),
			'parejaoca'=>Input::get('parejaoca'),
			'preservativo'=>Input::get('preservativo'),
			'preser_tipo'=>$tipopreser="0000-00-00",
			'ced_paciente'=>Input::get('cedula'),
			'Observacion'=>Input::get('obser'),
			'fecha_prenatal_c'=> $fecha,
			);
$id=$datospre['ced_paciente'];

$antecedente=DB::table('paciente')->where('ced_paciente', $id)->first();
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Actualizar Consulta Prenatal',
'cambio' =>$antecedente->nombres." ".$antecedente->apellidos,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);
registrar::GuardarUsuPrenetal($datospre);

$cod_medii=DB::table('prenatal')->where('ced_paciente', $id)->where('fecha_prenatal_c',$fecha)->first();
$cod_medica=$cod_medii->cod_prenatal;

for($i="0" ; $i<$totalmed ; $i++){
$datostratamiento= array(
'cod_tratamiento'=>null,
'cod_medicamento'=>$medicinas[$i],
'cod_prenatal'=>$cod_medica,);
registrar::GuardarTratamiento($datostratamiento);
}
			return View::make('prenatal')->with('cedula', '$id')
			->withErrors('Consulta prenatal agregada');
}



	}



	?>