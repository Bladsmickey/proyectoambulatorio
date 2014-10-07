@extends('layouts.master')

@section('content')

<div class="col-md-12">
@if ($errors->any())
<div class="alert alert-success" role="alert">
<p class="text-center">{{ implode('', $errors->all(':message')) }}</p>
</div>
@endif

<div class="col-md-6">
        <h4><p class="text-center"><b>Enfermedades o condiciones habilitadas</b></p></h4>
     {{ Form::open(array('url' => 'gestion/enfcond/deshabilitar', 'class'=>'form-horizontal')) }}
<?php $results = DB::table('enf_cond')->where('habil', '1')->get();
foreach ($results as $result)
{
echo '<label class="checkbox-inline">';
echo "<td><input name='enf[]' id='enf[]' type='checkbox' value='".$result->cod_enf_Cond."'></td><td>".$result->nombre."</td>. Tipo: <td>".$result->tipo."</td>";
echo '</label>';
echo '<br>    <br>';
}?>

<p class="text-center"> {{ Form::submit('Deshabilitar Enfermedad o condicion',array('class' => 'btn btn-danger')) }}</p>
      {{ Form::close() }}
</div>


<div class="col-md-6">
    <h4><p class="text-center"><b>Agregar Enfermedades o condiciones</b></p></h4>
  {{ Form::open(array('url' => 'gestion/enfcond/agregar', 'class'=>'form-horizontal')) }}
<label>Nombre Enfermedades o condiciones</label>
<input type="text" required="required" pattern="[a-zA-z0-9 ]+" title="Solo se permiten caracteres alfanumericos" name="enfcond" id="enfcond" class="form-control">
<label>Tipo de Enfermedades o condicionesa</label>
<select name="tipoenf" id="tipoenf" class="form-control">
    <option>Terminal</option>
    <option>Viral</option>
    <option>Bacteriana</option>
    <option>Embarazo</option>
</select>
<label>Descripcion</label>
<textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>

<br>
<p class="text-center">
    {{ Form::submit('Agregar Enfermedad o condicion',array('class' => 'btn btn-success')) }}
</p>
      {{ Form::close() }}
</div>



</div>

@stop