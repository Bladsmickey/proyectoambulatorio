@extends('layouts.master')

@section('content')
<?php
$etnias=DB::select('select * from etnia');
$estados=DB::select('select * from estado');
$municipio=DB::select('select * from municipio');
$cedula=Input::get('cedula');
$paciente = DB::table('paciente')->where('ced_paciente', $cedula)->first();

 ?>


   {{ Form::open(array('url' => 'paciente/actualizar', 'class'=>'form-horizontal')) }}

<div class="col-md-12">

<div class="tab-content">
    <div id="paciente" class="tab-pane fade in active">
       <legend>1. Datos personales</legend>
<div class="form-group">
<input type="hidden" name="actualizar" id="actualizar" value="1">
        <label class="col-md-2">Nombres</label>
        <div class="col-md-4">{{ Form::text('nombres', $paciente->nombres,array('class' => 'form-control','pattern'=>'[a-zA-Z ]+','title'=>'Solo se permiten letras','required'=>'required')) }}</div>

        <label class="col-md-2">Apellidos</label>

        <div class="col-md-4">{{ Form::text('apellidos', $paciente->apellidos,array('class' => 'form-control','pattern'=>'[a-zA-Z ]+','title'=>'Solo se permiten letras','required'=>'required')) }}</div>
</div>


<div class="form-group">

        <label class="col-md-2">C.I.N.V</label>
		<div class="col-md-2">
		{{Form::select('nacion', array('V-' => 'V-', 'E-' => 'E-'),$selected = NULL, array('class' => 'form-control'))}}
		</div>


    	<div class="col-md-3">
  {{ Form::text('cedula', $paciente->ced_paciente,array('class' => 'form-control','pattern'=>'[0-9]+','title'=>'Solo numeros y no espacios','required'=>'required')) }}
   		 </div>


        <label class="col-md-2">Etnia</label>


  		<div class="col-md-3">

            <select name="etnia" id="etnia" class="form-control">

                <?php foreach ($etnias as $key) {
                    echo "<option value=".$key->cod_etnia.">".$key->nombre."</option>";
                } ?>

            </select>
  		</div>

</div>


<div class="form-group">

	<label class="col-md-2">Nacionalidad</label>

	<div class="col-md-2">{{ Form::text('nacionalidad', $paciente->nacionalidad,array('class' => 'form-control','pattern'=>'[a-zA-Z ]+','title'=>'Solo se permiten letras','required'=>'required'))}}
    </div>




	<label class="col-md-2">Fecha Nacimiento</label>
	<div class="col-md-4"><input type="date" class="form-control" name="fechanac" id="fechanac" required="required" value="<?php echo $paciente->fecha_nacim ?>">
    </div>

<label class="col-md-2" id="edadpaciente">Edad: </label>
   <input type="hidden" name="edad" id="edad" value=""> 

</div>


<div class="form-group">
  <label class="col-md-2">Sexo</label>
<div class="col-md-10">
      <select name="sexo" id="sexo" class="form-control" value="<?php echo $paciente->sexo; ?>"><option value="Femenino">Femenino</option>
    <option value="Masculino">Masculino</option></select></div></div>

<legend>2. Datos situacionales</legend>

<div class="form-group">

        <label class="col-md-2">Situacion conyugal</label>

	<div class="col-md-4">
		{{Form::select('conyugal', array('Soltero' => 'Soltero', 'Casado' => 'Casado','Divorciado' => 'Divorciado','Complicado' => 'Complicado','Separado' => 'Separado','Viudo' => 'Viudo'),$selected = NULL, array('class' => 'form-control'))}}    </div>

        <label class="col-md-2">Nivel Educativo</label>
            <div class="col-md-4">
        {{Form::select('niveledu', array('Primaria' => 'Primaria', 'Secundaria' => 'Secundaria', 'Universitaria' => 'Universitaria'),$selected = NULL, array('class' => 'form-control'))}}
        </div>



</div>


<div class="form-group">
        <label class="col-md-2">Ocupacion</label>
        <div class="col-md-10">
        {{ Form::text('ocupacion', $paciente->ocupacion,array('class' => 'form-control','pattern'=>'[a-zA-Z ]+','title'=>'Solo se permiten letras','required'=>'required'))}}</div>
</div>

<legend>3. Datos de residencia actual</legend>

<div class="form-group">
        <label class="col-md-2">Estado Residencia</label>
        <div class="col-md-2">


 <select name="estresi" id="estresi" class="form-control">
          @foreach($estados as $estado)
     <option value="{{ $estado->cod_estado }}">{{ $estado->nombre }}</option> 
@endforeach
  </select>
</div>


        <label class="col-md-2">Municipio residencia</label>
        <div class="col-md-2">

  <select name="municresi" id="municresi" class="form-control">
<option selected="selected">--Seleccionar municipio--</option>
  </select>

    </div>


        <label class="col-md-2">Parroquia Residencia</label>
        <div class="col-md-2">

  <select name="parraresi" id="parraresi" class="form-control">
<option selected="selected">--Seleccionar Ciudad--</option>
  </select>

</div>
</div>


<div class="form-group">
        <label class="col-md-2">Urb/Sector/Barrio</label>
        <div class="col-md-3">
        {{ Form::text('urb', Input::old('urb'),array('class' => 'form-control','required'=>'required'))}}</div>
        <label class="col-md-4">Av/Carretera/Calle/Esquina/Vereda</label>
        <div class="col-md-3">
        {{ Form::text('av', Input::old('av'),array('class' => 'form-control','required'=>'required'))}}</div>



 </div>

<div class="form-group">

 		<label class="col-md-3">Casa/Edif/Quinta/Galpon</label>
        <div class="col-md-3">
        {{ Form::text('casa', Input::old('casa'),array('class' => 'form-control','required'=>'required'))}}</div>
        <label class="col-md-3">Piso/Planta/local</label>
		<div class="col-md-3">
        {{ Form::text('piso', Input::old('piso'),array('class' => 'form-control','required'=>'required'))}}</div>


</div>





<div class="form-group">

    <label class="col-md-2">Cod Postal</label>
        <div class="col-md-2">
        {{ Form::text('codpostal', Input::old('codpostal'),array('class' => 'form-control','pattern'=>'[0-9]+','title'=>'Solo se permiten letras','required'=>'required'))}}</div>


        <label class="col-md-2">Punto Referencia</label>
        <div class="col-md-6">
        {{ Form::text('ptoref', Input::old('ptoref'),array('class' => 'form-control','required'=>'required'))}}</div>


</div>

 <label class="col-md-2">Telefono Celular (Movil) </label>
  <div class="col-md-2">
    <select name="codarea" id="codarea" class="form-control">
    <option value="0235">0235</option>
    <option value="0424">0424</option>
    <option value="0414">0414</option>
    <option value="0412">0412</option>
    <option value="0416">0416</option>
    <option value="0426">0426</option>
</select></div>
<div class="col-md-8">
        {{ Form::text('telefcel', Input::old('telefcel'),array('min' => '1000000', 'title' => 'solo se permiten un maximo de 7 numeros','pattern' => '[0-9]+', 'class'=>'form-control', 'required' => 'required'))}}</div>
</div>





<div class="col-md-12 text-center">

  {{ Form::submit('Actualizar datos',array('class'=>'btn btn-success')) }}</div>
    </div>

</div>
</div>
  {{ Form::close() }}

<script type="text/javascript">
$(document).ready(
    function () {
 $('select#estnac').change(function(){
        var estnacId = $("#estnac").val();
        var url="/public/municipios/"+estnacId;
        console.log(url);
        $ciudaditems = $('.cityItems').remove();
        $.getJSON(url, function(data){
 $.each(data, function(index, element){
                //console.log(element);
                $('select#municnac').append('<option value="'+element.cod_municipio+'" class="cityItems">'+element.nombre+'</option>')
            });
        });
    });
});
</script>



<script type="text/javascript">
$(document).ready(
    function () {
 $('select#municnac').change(function(){
        var municnacId = $("#municnac").val();
        var url="/public/ciudad/"+municnacId;
        console.log(url);
        $ciudaditems = $('.ciudadItems').remove();
        $.getJSON(url, function(data){
 $.each(data, function(index, element){
                //console.log(element);
                $('select#ciudadnac').append('<option value="'+element.cod_parroquia+'" class="ciudadItems">'+element.nombre+'</option>')
            });
        });
    });
});



</script>

<script type="text/javascript">
$(document).ready(
    function () {
 $('select#estresi').change(function(){
        var estnacId = $("#estresi").val();
        var url="/public/municipios/"+estnacId;
        console.log(url);
        $ciudaditemsi = $('.cityItemsi').remove();
        $.getJSON(url, function(data){
 $.each(data, function(index, element){
                //console.log(element);
                $('select#municresi').append('<option value="'+element.cod_municipio+'" class="cityItemsi">'+element.nombre+'</option>')
            });
        });
    });
});
</script>



<script type="text/javascript">
$(document).ready(
    function () {
 $('select#municresi').change(function(){
        var municnacId = $("#municresi").val();
        var url="/public/ciudad/"+municnacId;
        console.log(url);
        $ciudaditemsi = $('.ciudadItemsi').remove();
        $.getJSON(url, function(data){
 $.each(data, function(index, element){
                //console.log(element);
                $('select#parraresi').append('<option value="'+element.cod_parroquia+'" class="ciudadItemsi">'+element.nombre+'</option>')
            });
        });
    });
});



</script>


  <script type="text/javascript">
$(document).ready(function(){






{{-- Funciones para cosas distintas --}}



$('#fechanac').on('ready mousemove change paste keyup', function(){
var fechaactual = new Date();

var diaActual = fechaactual.getDate();
var mmActual = fechaactual.getMonth() + 1;
var yyyyActual = fechaactual.getFullYear();
var fechanac=$('#fechanac').val();
var fechanacimiento=fechanac.split("-");
var anonac=fechanacimiento[0];
var mesnac=fechanacimiento[1];
var dianac=fechanacimiento[2];

if (mesnac.substr(0,1) == 0) {
mesnac= mesnac.substring(1, 2);
}

if (dianac.substr(0, 1) == 0) {
dianac = dianac.substring(1, 2);
}


var edad=yyyyActual-anonac;


if ((mmActual < mesnac) || (mmActual == mesnac && diaActual < dianac)) {
edad--;
}

$('#removerhijo').remove();


$('input[name=edad]').val(edad);
var mostrar = $('#edad').val();
$("#edadpaciente").append("<label id='removerhijo'>"+mostrar+" Años</label>");
console.log(mostrar);
});
});
  </script>



@stop