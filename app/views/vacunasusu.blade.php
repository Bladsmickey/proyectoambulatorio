@extends('layouts.master')

@section('content')


<legend><h3><p class="text-center">Vacunas aplicadas al paciente</p></h3></legend>

<?php $cedula=Input::get("cedula");


$results = DB::table('vacuna_x_paciente')->where('cod_paciente', $cedula)->get();


if($results){
echo "<table class='table table-responsive'>

<tr>
<td><b>Ced. Paciente</b></td><td><b>Vacuna aplicada</b></td><td><b>Fecha de aplicacion</b></td><td><b>Fecha de proxima dosis</b></td>
</tr>

";
foreach ($results as $key) {
$resulta = DB::table('vacuna')->where('cod_vacuna', $key->cod_vacuna)->get();
if($key->fecha_refuerzo=='0000-00-00'){$refuerzo="No posee";}else{$refuerzo=$key->fecha_refuerzo;}
echo "<tr>";
foreach ($resulta as $nema) {

echo"
<td>".$key->cod_paciente."</td>
<td>".$nema->nombre."</td>
<td>".$key->fecha."</td>
<td>".$refuerzo."</td>
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

echo "<div class='alert alert-danger' role='alert'><legend><h3><p class='text-center'>Este paciente no presenta ninguna vacuna.</p></h3></legend></div>";}
}




 ?>
 <p class="text-center"><button class="btn btn-primary" data-toggle="modal" data-target="#agregarvacunas">
  Aplicar vacunas
</button>

<button class="btn btn-primary" onclick="javascript:history.back();">
  Volver
</button></p>

{{-- Inicio Modal --}}

<div class="modal fade" id="agregarvacunas" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar vacunas</h4>
      </div>
      <div class="modal-body">


      	 {{ Form::open(array('url' => 'busqueda/vacunasusu/agregar', 'class'=>'form-horizontal')) }}
      	
<div class="col-md-12">
    
    <div class="form-group">

    <label class="col-md-4">Vacuna</label>

<div class="col-md-8">
    <select name="vacuna" id="vacuna" class="form-control">
    	


<?php $results = DB::table('vacuna')->where('habil', '1')->get();

foreach ($results as $result)
{

echo "<option value=".$result->cod_vacuna.">".$result->nombre."</option>";
}

?>

    </select>

</div>

  </div>
<input type="hidden" id="cedula" name="cedula" value=<?php echo $cedula; ?>>

<div class="form-group">

 <label class="col-md-4">Fecha de aplicacion</label>
<div class="col-md-8">
    <input type="date" class="form-control" name="fecha" id="fecha"></div> 

</div>

<div class="form-group">
 <label class="col-md-4">Fecha de proxima dosis</label>
<div class="col-md-8">
    <input type="date" class="form-control" name="fechaproxi" id="fechaproxi"></div> 

</div>

<div class="form-group">

 <label class="col-md-4">No tiene proxima dosis</label>
<div class="col-md-8">
    <input type="checkbox" id="notiene" value="desactivar"></div> 

</div>

      </div>


<div class="col-md-12" id="infovacuna">
  
</div>




      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>  
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>


{{-- Fin modal --}}





<script type="text/javascript">
$(document).ready(
    function () {
 $('select#vacuna').change(function(){
        var municnacId = $("#vacuna").val();
        var url="/public/cualvacuna/"+municnacId;
        $.getJSON(url, function(data){
          console.log(data[0].nombre);


if(data[0].Intervalo_dosis=='0 Semanas'){
  var intervalo="No aplica";
}else{
   var intervalo=data[0].Intervalo_dosis;
}

if(data[0].refuerzo==0){
  var refuerzo="No aplica";
}else{
  var refuerzo=data[0].refuerzo+" Veces";
}
  
  $('#infovacuna').append('<div class="alert alert-success"><p>Informacion de la vacuna:</p><p><b>Nombre: </b>'+data[0].nombre+' <b>Via de aplicacion</b>:'+data[0].tipo+'</p><p><b>Edad de aplicacion: </b>'+data[0].edad_apli+' <b>Dosificaion</b>:'+data[0].dosificacion+'</p><p><b>Intervalo entre dosis: </b>'+intervalo+' <b>Refuerzo</b>:'+refuerzo+'</p></div>');




        });
    });


 $('#notiene').on('click',function(){

 if($("#notiene").is(':checked')){
    $('#fechaproxi').prop('disabled', true);
  }else{
    $('#fechaproxi').prop('disabled', false);
  }


    });







});



</script>




@stop