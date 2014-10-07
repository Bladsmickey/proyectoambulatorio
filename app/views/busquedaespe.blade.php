@extends('layouts.master')

@section('content')



<?php 

$cedula=Input::get('cedula');
$paciente=DB::table('paciente')->where('ced_paciente', $cedula)->get();
$diren=DB::table('direccion_n')->where('cod_direccion_n', $cedula)->get();
$direa=DB::table('direccion_a')->where('cod_direc_a', $cedula)->get();
$antec_x_paciente=DB::table('antec_x_paciente')->where('cod_antec_paciente', $cedula)->get();



?>

<legend>1. Datos del paciente</legend>

<table class="table table-bordered">
	
	<tr>
	
	<td><b>Nombre</b></td>
	<td><b>Apellidos</b></td>
	<td><b>Telefono</b></td>
	<td><b>Ocupacion</b></td>
	<td><b>Sexo</b></td>
	<td><b>Fecha de nacimiento</b></td>
</tr>
<tr>
	<?php

foreach ($paciente as $key => $ke ) {
echo "<td>".$ke->nombres."</td>";
echo "<td>".$ke->apellidos."</td>";
echo "<td>".$ke->telf."</td>";
echo "<td>".$ke->ocupacion."</td>";
$tiposexo=$ke->sexo;
echo "<td>".$ke->sexo."</td>";
$sexo=$ke->sexo;
echo "<td>".$ke->fecha_nacim."</td>";

}

	?>
</tr>
</table>
<legend>2. Datos de residencia actual</legend>
<table class="table table-bordered">
	<tr>
	<td><b>Estado</b></td>
	<td><b>Municipio</b></td>
	<td><b>Parroquia</b></td>
	<td><b>Cod. Postal</b></td>
	<td><b>Direccion</b></td>
</tr>
<tr>
	<?php

foreach ($direa as $key => $ke ) {
	$estedo=DB::table('estado')->where('cod_estado', $ke->estado)->first();
		$municipio=DB::table('municipio')->where('cod_municipio', $ke->municipio)->first();
			$parroquia=DB::table('parroquia')->where('cod_parroquia', $ke->parroquia)->first();
echo "<td>".$estedo->nombre."</td>";
echo "<td>".$municipio->nombre."</td>";
echo "<td>".$parroquia->nombre."</td>";
echo "<td>".$ke->codpostal."</td>";
echo "<td>".$ke->descripcion."</td>";

}

	?>
</tr>
</table>

<legend>3. Datos de nacimiento</legend>

<table class="table table-bordered">
	<tr>
	<td><b>Pais</b></td>
	<td><b>Estado</b></td>
	<td><b>Municipio</b></td>
	<td><b>Parroquia</b></td>
	
</tr>
<tr>
	<?php

foreach ($diren as $key => $ke ) {
echo "<td>".$ke->descripcion."</td>";
$estedo=DB::table('estado')->where('cod_estado', $ke->estado)->first();
		$municipio=DB::table('municipio')->where('cod_municipio', $ke->municipio)->first();
			$parroquia=DB::table('parroquia')->where('cod_parroquia', $ke->parroquia)->first();
echo "<td>".$estedo->nombre."</td>";
echo "<td>".$municipio->nombre."</td>";
echo "<td>".$parroquia->nombre."</td>";


}

	?>
</tr>
</table>

<legend>Operaciones a realizar</legend>

<div class="col-md-3">
   {{ Form::open(array('url' => 'busqueda/vacunasusu', 'class'=>'form-horizontal')) }}
   <input type="hidden" value=<?php echo $cedula; ?> name="cedula" id="cedula">
   {{ Form::submit('Consultar Vacunas',array('class'=>'btn btn-info')) }}
   {{ Form::close() }}

 </div>
<?php if($sexo=="Femenino"): ?>

<div class="col-md-3"> {{ Form::open(array('url' => 'busqueda/antecedenteusu', 'class'=>'form-horizontal')) }}
   <input type="hidden" value=<?php echo $cedula; ?> name="cedula" id="cedula">
   {{ Form::submit('Consultar Antecedentes',array('class'=>'btn btn-info')) }}
   {{ Form::close() }}</div>


   <div class="col-md-3"> {{ Form::open(array('url' => 'busqueda/prenatal', 'class'=>'form-horizontal')) }}
   <input type="hidden" value=<?php echo $cedula; ?> name="cedula" id="cedula">
   {{ Form::submit('Consultar Prenatal',array('class'=>'btn btn-info')) }}
   {{ Form::close() }}</div>
<?php endif; ?>
<div class="col-md-3">
 {{ Form::open(array('url' => 'actualizarusu', 'class'=>'form-horizontal')) }}
   <input type="hidden" value=<?php echo $cedula; ?> name="cedula" id="cedula">
   {{ Form::submit('Editar datos del paciente',array('class'=>'btn btn-info')) }}
   {{ Form::close() }}</div>


@stop


