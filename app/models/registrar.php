<?php

class registrar extends Eloquent{

protected $guardar = array();
protected $tabla = 'usuarios';
public $estampas = false;

public static function GuardarDatos($array){
	DB::table('usuarios')->insert($array);
}

public static function GuardarBitacora($array){
	DB::table('bitacora')->insert($array);
}

public static function GuardarPaciente($array){
	DB::table('paciente')->insert($array);
}

public static function GuardarTratamiento($array){
	DB::table('tratamiento')->insert($array);
}

public static function ActualizarPaciente($array){
	DB::table('paciente')->where('ced_paciente', $array['ced_paciente'])->update($array);
}


public static function GuardarPacientedirea($array){
	DB::table('direccion_a')->insert($array);
}

public static function ActualizarPacientedirea($array){
	DB::table('direccion_a')->where('cod_direc_a', $array['cod_direc_a'])->update($array);
}


public static function GuardarPacientediren($array){
	DB::table('direccion_n')->insert($array);
}

public static function GuardarVacuna($array){
	DB::table('vacuna')->insert($array);
}

public static function GuardarAntecedente($array){
	DB::table('antecedente')->insert($array);
}

public static function Guardarenfer($array){
	DB::table('enf_cond')->insert($array);
}

public static function GuardarMed($array){
	DB::table('medicamento')->insert($array);
}

public static function GuardarUsuVacu($array){
	DB::table('vacuna_x_paciente')->insert($array);
}

public static function GuardarUsuAnte($array){
	DB::table('antec_x_paciente')->insert($array);
}
public static function GuardarUsuPrenetal($array){
	DB::table('prenatal')->insert($array);
}


}


?>