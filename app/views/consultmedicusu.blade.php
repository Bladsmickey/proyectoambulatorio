@extends('layouts.master')

@section('content')


<legend><h3><p class="text-center">Ultima consulta medica</p></h3></legend>

<?php 
$cedula=Input::get("cedula");
$results = DB::table('antec_x_paciente')->where('cod_antec_paciente', $cedula)->get();


if($results){

echo "<table class='table table-responsive'>
<tr>
<td><b>Ced. Paciente</b></td><td><b>Antecedente</b></td><td><b>Descripcion</b></td><td><b>Tipo de antecedente</b></td>
</tr>

";
foreach ($results as $key) {
$resulta = DB::table('antecedente')->where('cod_antecedente', $key->cod_antecedente)->get();
if($key->descripcion=='null'){$descrip= 'No aplica';}else{$descrip=$key->descripcion;}
echo "<tr>";
foreach ($resulta as $nema) {
if($nema->tipo=='19'){$tipito= 'Perinatales en menores de 19 años';}
if($nema->tipo=='familiares'){$tipito= 'Familiares y otros contactos';}
if($nema->tipo=='acualquieredad'){$tipito= 'Personales a cualquier edad';}
echo"
<td>".$key->cod_antec_paciente."</td>
<td>".$nema->nombre."</td>
<td>".$descrip."</td>
<td>".$tipito."</td>
";
}
echo "</tr>";
}
echo "</table>";
}else{

if ($errors->any()){
echo '<div class="alert alert-success" role="alert">';
echo '<p class="text-center"> implode("", $errors->all(":message")) </p>';
echo "</div>";
}else{

echo "<div class='alert alert-danger' role='alert'><legend><h3><p class='text-center'>Este paciente no presenta ningun antecedente, te invitamos a actualizarlos.</p></h3></legend></div>";}
}




 ?>
 <p class="text-center"><button class="btn btn-primary" data-toggle="modal" data-target="#agregarante">
  Agregar Antecedentes
</button>

<button class="btn btn-primary" onclick="javascript:history.back();">
  Volver
</button></p>

{{-- Inicio Modal --}}

<div class="modal fade" id="agregarante" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Antecedentes</h4>
      </div>
      <div class="modal-body">


      	 {{ Form::open(array('url' => 'busqueda/antecedenteusu/agregar', 'class'=>'form-horizontal')) }}
      	
<div class="col-md-12">
    
    <div class="form-group">

    <label class="col-md-2">Antecedente</label>

<div class="col-md-4">
    <select name="antecedente" id="antecedente" class="form-control">
    	


<?php $results = DB::table('antecedente')->where('habil', '1')->get();

foreach ($results as $result)
{

echo "<option value=".$result->cod_antecedente.">".$result->nombre."</option>";
}

?>

    </select>

</div>

    <label class="col-md-2">Descripcion</label>
    <div class="col-md-4">
    <input type="text" name="descrip" id="descrip" class="form-control">
</div></div>
<input type="hidden" id="cedula" name="cedula" value=<?php echo $cedula; ?>>


      </div></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>  
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>


{{-- Fin modal --}}

@stop