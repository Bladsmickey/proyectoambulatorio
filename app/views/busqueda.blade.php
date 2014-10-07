
@extends('layouts.master')

@section('content')



<?php 

$cedula=Input::get('cedula');
$paciente=DB::select(DB::raw("SELECT * FROM paciente
WHERE CONCAT( nombres,  ' ', apellidos ) LIKE  '%".$cedula."%'
OR CONCAT( apellidos,  ' ', nombres ) LIKE  '%".$cedula."%'
OR ced_paciente =  '".$cedula."'"));


?>

<legend>Resultados para {{$cedula}}: </legend>

<?php if($paciente==null): ?>
	<div class="col-md-12 alert alert-warning">
		Lo sentimos, no encontramos ningun resultado.
	</div>
<?php endif; ?>

<?php if($paciente!=null): ?>
<table class="table table-bordered table-responsive">
	
	<tr>
	<td><b>Cedula</b></td>
	<td><b>Nombre</b></td>
	<td><b>Apellidos</b></td>
	<td><b>Telefono</b></td>
	<td><b>Ocupacion</b></td>
	<td><b>Fecha de nacimiento</b></td>
	<td><b>Ficha de paciente</b></td>
</tr>
<tr>

	<?php foreach($paciente as $key): ?>

	<td>{{$key->ced_paciente}}</td>
	<td>{{$key->nombres}}</td>
	<td>{{$key->apellidos}}</td>
	<td>{{$key->telf}}</td>
	<td>{{$key->ocupacion}}</td>
	<td>{{$key->fecha_nacim}}</td>
	<td>
<?php if(Input::get('propre')=='1'): ?>
{{Form::open(array('url' => 'reportes/ProgPre/generar', 'class'=>'form-horizontal'))}}
<input type='hidden' id='cedula' name='cedula' value=<?php echo $key->ced_paciente; ?>>
<button type='submit' class='btn btn-primary btn-block'>
<span class='glyphicon glyphicon-file'></span> Programa de prevencion
</button>
{{Form::close()}}

<?php endif; ?>

<?php if(Input::get('ficha')=='1'): ?>
{{Form::open(array('url' => 'busqueda/paciente/pacienteespe', 'class'=>'form-horizontal'))}}
<input type='hidden' id='cedula' name='cedula' value=<?php echo $key->ced_paciente; ?>>
<button type='submit' class='btn btn-primary btn-block'>
<span class='glyphicon glyphicon-file'></span> Ficha de paciente
</button>
{{Form::close()}}
<?php endif; ?>


	</td>


	
</tr>
<?php endforeach; ?>
</table>

<?php endif; ?>
@stop

