@extends('layouts.master')

@section('content')

<div class="col-md-12">
@if ($errors->any())
<div class="alert alert-success" role="alert">
<p class="text-center">{{ implode('', $errors->all(':message')) }}</p>
</div>
@endif

<div class="col-md-6">
        <h4><p class="text-center"><b>Medicamentos Habilitados</b></p></h4>
     {{ Form::open(array('url' => 'gestion/medicamentos/deshabilitar', 'class'=>'form-horizontal')) }}
<?php $results = DB::table('medicamento')->where('habil', '1')->get();
foreach ($results as $result)
{
echo '<label class="checkbox-inline">';
echo "<td><input name='med[]' id='med[]' type='checkbox' value='".$result->cod_medicamento."'></td><td>".$result->nombre."</td>. Tipo: <td>".$result->tipo."</td>";
echo '</label>';
echo '<br>    <br>';
}?>

<p class="text-center"> {{ Form::submit('Deshabilitar medicamentos',array('class' => 'btn btn-danger')) }}</p>
      {{ Form::close() }}
</div>


<div class="col-md-6">
    <h4><p class="text-center"><b>Agregar medicamentos</b></p></h4>
  {{ Form::open(array('url' => 'gestion/medicamentos/agregar', 'class'=>'form-horizontal')) }}
<label>Nombre del medicamento</label>
<input type="text" required="required" pattern="[a-zA-z0-9 ]+" title="Solo se permiten caracteres alfanumericos" name="medicamento" id="medicamento" class="form-control">
<label>Tipo de Medicamento</label>
<select name="tipomed" id="tipomed" class="form-control">
    <option>Capsulas blandas</option>
    <option>Capsulas duras</option>
    <option>Jarabes</option>
</select>
<label>Descripcion</label>
<textarea name="descripcion" id="descripcion" cols="30" rows="10" class="form-control"></textarea>

<br>
<p class="text-center">
    {{ Form::submit('Agregar medicamentos',array('class' => 'btn btn-success')) }}
</p>
      {{ Form::close() }}
</div>



</div>

@stop