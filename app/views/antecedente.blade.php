@extends('layouts.master')

@section('content')


<div class="col-md-12">
@if ($errors->any())
<div class="alert alert-success" role="alert">
<p class="text-center">{{ implode('', $errors->all(':message')) }}</p>
</div>
@endif

<div class="col-md-6">
        <h4><p class="text-center"><b>Antecedentes Habilitados</b></p></h4>
     {{ Form::open(array('url' => 'gestion/antecedente/deshabilitar', 'class'=>'form-horizontal')) }}
<?php $results = DB::table('antecedente')->where('habil', '1')->get();
foreach ($results as $result)
{
  if($result->tipoinfo==1){
$tipo="Verdadero/Falso";
  }else{
    $tipo="Texto";
  }
echo '<label class="checkbox-inline">';
echo "<td><input name='ante[]' id='ante[]' type='checkbox' value='".$result->cod_antecedente."'></td><td>".$result->nombre."</td>. Tipo: <td>".$tipo."</td>";
echo '</label>';
echo '<br>    <br>';
}?>

<p class="text-center"> {{ Form::submit('Deshabilitar Antecedente',array('class' => 'btn btn-danger')) }}</p>
      {{ Form::close() }}
</div>


<div class="col-md-6">
    <h4><p class="text-center"><b>Agregar Antecedente</b></p></h4>
  {{ Form::open(array('url' => 'gestion/antecedente/agregar', 'class'=>'form-horizontal')) }}
<label>Nombre Antecedente</label>
<input type="text" required="required" pattern="[a-zA-z0-9]+" title="Solo se permiten caracteres alfanumericos" name="antecedente" id="antecedente" class="form-control">
<label>Tipo de Antecedente</label>
<select name="tipoante" id="tipoante" class="form-control">
    <option value="19">Perinatales en menores de 19 años</option>
    <option value="familiares">Familiares y otros contactos</option>
    <option value="acualquieredad">Personales a cualquier edad</option>
</select>
<label>Tipo de Informacion</label>
<select name="tipoinfo" id="tipoinfo" class="form-control">
    <option value="1">Verdadero/Falso</option>
    <option value="2">Texto</option>
</select>
<br>
<p class="text-center">
    {{ Form::submit('Agregar Antecedente',array('class' => 'btn btn-success')) }}
</p>
      {{ Form::close() }}
</div>






</div>

@stop