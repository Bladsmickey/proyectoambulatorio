@extends('layouts.master')

@section('content')



  

<div class="col-md-12">
@if ($errors->any())
<div class="alert alert-success" role="alert">
<p class="text-center">{{ implode('', $errors->all(':message')) }}</p>
</div>
@endif

<div class="col-md-6">
        <h4><p class="text-center"><b>Vacunas habilitadas</b></p></h4>
     {{ Form::open(array('url' => 'gestion/vacuna/deshabilitar', 'class'=>'form-horizontal')) }}
<?php $results = DB::table('vacuna')->where('habil', '1')->get();
foreach ($results as $result)
{
echo '<label class="checkbox-inline">';
echo "<td><input name='vacu[]' id='vacu[]' type='checkbox' value='".$result->cod_vacuna."'></td><td>".$result->nombre."</td>. Tipo: <td>".$result->tipo."</td>";
echo '</label>';
echo '<br>    <br>';
}?>

<p class="text-center"> {{ Form::submit('Deshabilitar Vacunas',array('class' => 'btn btn-danger')) }}</p>
      {{ Form::close() }}
</div>


<div class="col-md-6">
    <h4><p class="text-center"><b>Agregar Vacuna</b></p></h4>
  {{ Form::open(array('url' => 'gestion/vacuna/agregar', 'class'=>'form-horizontal')) }}
<label>Nombre vacuna</label>
<input type="text" required="required" pattern="[a-zA-z0-9 ]+" title="Solo se permiten caracteres alfanumericos" name="vacuna" id="vacuna" class="form-control">
<label>Via de administracion</label>
<select name="tipovacu" id="tipovacu" class="form-control">
    <option>Subcutanea</option>
    <option>Intravenosa</option>
    <option>Intramuscular</option>
    <option>Oral</option>
    <option>Intradérmica</option>
</select>

<div class="form-group">
<div class="col-md-12">
<label>Edad de administracion</label></div>

<div class="col-md-4">
<input type="number" name="edadapli" id="edadapli" class="form-control"></div>
<div class="col-md-8">
<select name="edadapliespe" id="edadapliespe" class="form-control">
<option>Horas</option>
<option>Dias</option>
<option>Semanas</option>
<option>Meses</option>
<option>Años</option>
</select></div>
</div>

<div class="form-group">
<div class="col-md-12"><label>Dosificacion</label></div>

<div class="col-md-12">
<div class="input-group">
<input type="number" class="form-control" name="dosificacion" id="dosificacion" step="any">  
<span class="input-group-addon">CC</span>
</div>
</div>
</div>

<label>Dosis maxima</label>
<input type="number" name="dosis" required="required" pattern="[0-9]" id="dosis" class="form-control">

<label class="col-md-12">Intervalo entre dosis</label>
<div class="form-group col-md-12">


<div class="col-md-4">
<input type="number" name="interdosis" required="required" pattern="[0-9]" id="interdosis" class="form-control">
</div>
<div class="col-md-8">
<select name="interdosisespe" id="interdosisespe" class="form-control">
<option>Horas</option>
<option>Dias</option>
<option>Semanas</option>
<option>Meses</option>
<option>Años</option>
</select></div>
</div>






<label>Refuerzo</label>
<input type="text" name="refuerzo" required="required" id="refuerzo" class="form-control">
<label>Descripcion</label>
<textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>

<br>
<p class="text-center">
    {{ Form::submit('Agregar vacuna',array('class' => 'btn btn-success')) }}
</p>
      {{ Form::close() }}
</div>






</div>

@stop