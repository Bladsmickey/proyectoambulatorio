@extends('layouts.master')

@section('content')


<legend><h3><p class="text-center">Historial de consultas prenatales</p></h3></legend>

<?php $cedula=Input::get("cedula");


$results = DB::table('prenatal')->where('ced_paciente', $cedula)->get();


if($results){
echo "<table class='table table-responsive'>

<tr>
<td><b>Ced. Paciente</b></td><td><b>Nombres y apellidos</b></td><td><b>Fecha de consulta</b></td><td><b>Observaciones</b><td><b>Medicamentos</b></td></td><td><b>Planilla</b></td>
</tr>

";
foreach ($results as $key) {
$cod_pre=$key->cod_prenatal;
$resulta = DB::table('paciente')->where('ced_paciente', $key->ced_paciente)->get();
echo "<tr>";
foreach ($resulta as $nema) {
$cod_pre=$key->cod_prenatal;
echo"
<td>".$key->ced_paciente."</td>
<td>".$nema->nombres." ".$nema->apellidos."</td>
<td>".$key->fecha_prenatal_c."</td>
<td>".$key->Observacion."</td>";

$tratamiento=DB::table("tratamiento")->where('cod_prenatal',$cod_pre)->get();


echo "<td>";
foreach ($tratamiento as $keys) {
$medicament=DB::table('medicamento')->where('cod_medicamento',$keys->cod_medicamento)->first();
echo $medicament->nombre; echo "<br>";
}
echo "</td>";

echo "
<td>".Form::open(array('url' => 'reportes/ProgPre/generar', 'class'=>'form-horizontal'))."
<input type='hidden' id='cedula' name='cedula' value=".$cedula.">
<input type='hidden' id='cod_pre' name='cod_pre' value=".$cod_pre.">
<button type='submit' class='btn btn-primary btn-block'>
<span class='glyphicon glyphicon-file'></span>  Generar planilla
</button>".Form::close()."
</td>
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

echo "<div class='alert alert-danger' role='alert'><legend><h3><p class='text-center'>Este paciente no presenta ninguna consulta prenatal.</p></h3></legend></div>";}
}




 ?>
 <p class="text-center"><button class="btn btn-primary" data-toggle="modal" data-target="#agregarvacunas">
  Nueva consulta prenatal
</button>

<button class="btn btn-primary" onclick="javascript:history.back();">
  Volver
</button></p>

{{-- Inicio Modal --}}

<div class="modal fade" id="agregarvacunas" tabindex="-1" role="form" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span></button>
        <h4 class="modal-title" id="myModalLabel">Consulta prenatal</h4>
      </div>
      <div class="modal-body">


      	 {{ Form::open(array('url' => 'busqueda/prenatal/agregar', 'class'=>'form-horizontal')) }}
      	
<div class="col-md-12">

<legend>1. Antecedentes Gineco/Obtetricos</legend>

    <input type="hidden" id="cedula" name="cedula" value=<?php echo $cedula; ?>>
    <input type="hidden" id="fecha_pre" name="fecha_pre" value=<?php echo date("d-m-Y"); ?>>
<div class="form-group">
<label class="col-md-3">Nª de gesta</label>
<div class="col-md-3"><input type="number" name="numgesta" id="numgesta" class="form-control"></div>
<label class="col-md-3">Nª de partos</label>
<div class="col-md-3"><input type="number" name="numparto" id="numparto" class="form-control"></div>
</div>

<div class="form-group">
<label class="col-md-3">Nª de abortos</label>
<div class="col-md-3"><input type="number" name="numabortos" id="numabortos" class="form-control"></div>
<label class="col-md-3">Nª de hijos</label>
<div class="col-md-3"><input type="number" name="numhijos" id="numhijos" class="form-control"></div>
</div>

<div class="form-group">

<label class="col-md-3">Edad del ultimo hijo</label><div class="col-md-3"><input type="number" name="edaduhijo" id="edaduhijo" class="form-control"></div>
<label class="col-md-3">Fecha de ultima menstruacion</label><div class="col-md-3"><input type="date" name="fum" id="fum" class="form-control"></div></div>


<div class="form-group">
<label class="col-md-3">Edad inicio de relaciones sexuales</label><div class="col-md-3"><input type="number" name="eirs" id="eirs" class="form-control"></div>
<label class="col-md-3">Semanas de gestacion</label><div class="col-md-3"><input type="number" name="semgesta" id="semgesta" class="form-control"></div></div>

<div class="form-group">
<label class="col-md-3">Fecha probable de parto</label><div class="col-md-3"><input type="date" name="fpp" id="fpp" class="form-control"></div>
<label class="col-md-3">Control prenatal</label><div class="col-md-3"><input type="number" name="controlpre" id="controlpre" class="form-control"></div>
</div>


<div class="form-group">
<label class="col-md-3">Ha sufrido de alguna enfrmedad</label><div class="col-md-3">
<select name="enfer" id="enfer" class="form-control">
  <option value="si">Si</option>
  <option value="no">No</option>
</select>
</div>
<label class="col-md-3">Especifique</label><div class="col-md-3"><input type="text" name="enferespe" id="enferespe" class="form-control"></div>
</div>

<div class="form-group">
<label class="col-md-3">Hepatitis</label><div class="col-md-3">
<select name="vachep" id="vachep" class="form-control">
  <option value="si">Si</option>
  <option value="no">No</option>
</select>
</div>
<label class="col-md-3">Fecha</label><div class="col-md-3"><input type="date" name="fechahep" id="fechahep" class="form-control"></div>
</div>
<div class="form-group">
<label class="col-md-3">Vacunacion anti-hepatitis</label><div class="col-md-3">
<select name="vacantihep" id="vacantihep" class="form-control">
  <option value="si">Si</option>
  <option value="no">No</option>
</select></div>
<label class="col-md-3">Fecha</label><div class="col-md-3"><input type="date" name="fechaantihep" id="fechaantihep" class="form-control"></div>
</div>


<legend>2. Factores de riesgo</legend>

<div class="form-group">
<label class="col-md-3">He recibido transfucion Sanguinea/Hemoderivados</label>
<div class="col-md-3">
<select name="sanguinea" id="sanguinea" class="form-control">
<option value="si">Si</option>
<option value="no">No</option></select></div>
<label class="col-md-3">Cuando</label>
<div class="col-md-3"><input type="date" id="fechasanguinea" name="fechasanguinea" class="form-control"></div>
</div>
<div class="form-group">
<label class="col-md-3">He consumido drogas</label>
<div class="col-md-3">
  <select name="drogas" id="drogas" class="form-control">
    <option value="si">Si</option>
    <option value="no">No</option>
  </select>
</div>
<label class="col-md-3">Tipo</label>
<div class="col-md-3">
  <input type="text" name="tipodrogas" id="tipodrogas" class="form-control">
</div>
</div>

<div class="form-group">
<label class="col-md-3">Tiene pareja fija</label>
<div class="col-md-3">
  <select name="parejafija" id="parejafija" class="form-control">
    <option value="si">Si</option>
    <option value="no">No</option>
  </select>
</div>

<label class="col-md-3">Tiene pareja ocasional</label>
<div class="col-md-3">
  <select name="parejaoca" id="parejaoca" class="form-control">
    <option value="si">Si</option>
    <option value="no">No</option>
  </select>
</div>
</div>

<div class="form-group">
<label class="col-md-3">Ha usado preservativos</label>
<div class="col-md-3">
  <select name="preservativo" id="preservativo" class="form-control">
    <option value="si">Si</option>
    <option value="no">No</option>
  </select>
</div>
<label class="col-md-3">Tipo</label>
<div class="col-md-3"><input type="text" name="tipopreser" id="tipopreser" class="form-control"></div>
</div>


<div id="medicamento" class="form-group">
   <label class="col-md-2">Medicamentos</label>
   <div class="col-md-12">
     <select name="medicinas[]" multiple="true" id="medicinas[]" class="form-control chosen">
      <?php

$med=DB::table('medicamento')->get();
foreach($med as $medi){
  echo "<option value='$medi->cod_medicamento'>$medi->nombre</option>";
}

      ?>
     </select>
   </div>
</div>


<div class="form-group">
  <label class="col-md-2">Observacion</label>
<div class="col-md-10"><input type="text" id="obser" name="obser" class="form-control"></div>
</div>









</div>


    </div>
      <div class="modal-footer">
        <p class="text-center">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>  </p> 
        {{ Form::close() }}
      </div>
    </div>
  </div>
</div>


{{-- Fin modal --}}

    {{ HTML::style('css/chosen.min.css', array('media' => 'screen')) }}
    {{ HTML::script('js/chosen.jquery.min.js'); }}

<script>
  $(document).ready(function(){

 $(".chosen").attr("data-placeholder", "Seleccione uno o mas medicamentos").chosen({
  width: "100%",
  no_results_text : "No se encontro el medicamento"
});

    $('#enfer').on('change',function(){
var valor=$('#enfer').val();
      if(valor=="no"){
        $('#enferespe').prop('disabled', true);
      }else{
        $('#enferespe').prop('disabled', false);
      }
    });


    $('#vachep').on('change',function(){
var valor=$('#vachep').val();
      if(valor=="no"){
        $('#fechahep').prop('disabled', true);
      }else{
        $('#fechahep').prop('disabled', false);
      }
    });



    $('#vacantihep').on('change',function(){
var valor=$('#vacantihep').val();
      if(valor=="no"){
        $('#fechaantihep').prop('disabled', true);
      }else{
        $('#fechaantihep').prop('disabled', false);
      }
    });



        $('#sanguinea').on('change',function(){
var valor=$('#sanguinea').val();
      if(valor=="no"){
        $('#fechasanguinea').prop('disabled', true);
      }else{
        $('#fechasanguinea').prop('disabled', false);
      }
    });



            $('#drogas').on('change',function(){
var valor=$('#drogas').val();
      if(valor=="no"){
        $('#tipodrogas').prop('disabled', true);
      }else{
        $('#tipodrogas').prop('disabled', false);
      }
    });




                $('#preservativo').on('change',function(){
var valor=$('#preservativo').val();
      if(valor=="no"){
        $('#tipopreser').prop('disabled', true);
      }else{
        $('#tipopreser').prop('disabled', false);
      }
    });





  });
</script>

@stop



