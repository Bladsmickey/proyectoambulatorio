@extends('layouts.master')

@section('content')

<?php $cedula=Input::get('cedula');
$cod_pre=Input::get('cod_pre');
$results = DB::table('prenatal')->where('ced_paciente', $cedula)->where('cod_prenatal',$cod_pre)->get();
if($results){
  $tiene=1;
}else{
  $tiene=0;
}

?>

<?php if($tiene==1): ?>
<div id="imprimir" class="visible-print-block">

<div class="col-md-12">
{{ HTML::image("img/gobierno.png", "imagen",array('width'=>'1000px','height'=>'100px','class'=>'img-responsive')) }}
</div>

<div class="col-md-12">
  <h4><p class="text-center">PROGRAMA DE PREVENCION DE LA TRANSMICION VERTICAL VIH-SIDA/SIFILIS CONGENITA</p></h4>
</div>

<label class="col-md-12">1. DATOS DE LA INSTITUCION</label>


  
  <div class="form-group">
  <div class="col-md-3">Municipio</div> <div class="col-md-3"><p><u>Leonardo Infante</u></p></div>
  <div class="col-md-3">Parroquia</div> <div class="col-md-3"><p><u>VDLP</u></p></div>
</div>

<div class="form-group">
  <div class="col-md-3">Ambulatorio</div>  <div class="col-md-3"><p><u>Integral del centro</u></p></div>
  <div class="col-md-3">Numero de casos</div> <div class="col-md-3"><p><u>10</u></p></div>

</div>
<?php foreach($results as $key): ?>
<label class="col-md-12">2. DATOS DEL PACIENTE</label>

<div class="form-group">
  <div class="col-md-2">Nª de gesta</div><div class="col-md-1"><u> {{ $key->nro_gesta }}</u></div>
  <div class="col-md-2"> Nª de parto</div><div class="col-md-1"><u>{{$key->nmr_parto}}</u></div>
  <div class="col-md-2">Nª de abortos</div><div class="col-md-1"><u>{{$key->nmr_aborto}}</u></div>
  <div class="col-md-2">Nª de hijos</div><div class="col-md-1"><u>{{$key->nmr_hijos}}</u></div>
</div>

<div class="form-group">
  <div class="col-md-3">Edad del ultimo hijo</div><div class="col-md-3"><u>{{$key->edad_uh}}</u></div>
  <div class="col-md-4">Fecha de la ultima menstruacion</div><div class="col-md-2"><u>{{$key->fur}}</u></div>
</div>

<div class="form-group">
  <div class="col-md-5">Edad inicio de las relaciones sexuales: </div><div class="col-md-1"><u>{{$key->edad_irs}}</u></div>
  <div class="col-md-2">Semanas de gestacion: </div><div class="col-md-1"><u>{{$key->sem_gest}}</u></div>
  <div class="col-md-1">FPP: </div><div class="col-md-2"><u>{{$key->fpp}}</u></div>
</div>

<div class="form-group">
<div class="col-md-3">Control prenatal Nª: </div><div class="col-md-2">{{$key->control_pre}}</div>
<div class="col-md-5">A sufrido alguna enfermedad sexual</div><div class="col-md-2">{{$key->enf_sex}}</div>
</div>

<div class="form-group">
  <div class="col-md-2">Especifique</div><div class="col-md-3">{{$key->enf_sex_espef}}</div>
  <div class="col-md-2">Hepatitis</div><div class="col-md-1">{{$key->hepatitis}}</div>
  <div class="col-md-2">Fecha</div> <div class="col-md-2">{{$key->hep_fecha}}</div>
</div>

<div class="form-group">
  <div class="col-md-5">Vacunacion Antihepatitis "B"</div>  <div class="col-md-1">{{$key->vac_hep}}</div>
  <div class="col-md-3">Fecha</div><div class="col-md-3">{{$key->vac_hep_fecha}}</div>
</div>

<label class="col-md-12">3. FACTORES DE RIESGO</label>

<div class="form-group">
  <div class="col-md-6">Ha recibido transfucion Sanguinea/Hemoderivados</div><div class="col-md-1">{{$key->tranf_sang}}</div>
  <div class="col-md-2">Cuando</div><div class="col-md-3">{{$key->tranf_sang_fecha}}</div>
</div>

<div class="form-group">
  <div class="col-md-4">Ha consumido drogas</div><div class="col-md-2">{{$key->drogas}}</div>
  <div class="col-md-3">Tipo</div><div class="col-md-3">{{$key->drogas_tipo}}</div>
</div>

<div class="form-group">
  <div class="col-md-4">Tiene pareja fija</div><div class="col-md-2">{{$key->parejafija}}</div>
  <div class="col-md-4">Tiene pareja ocacional</div><div class="col-md-2">{{$key->parejaoca}}</div>
</div>
<div class="form-group">
  <div class="col-md-4">Ha usado preservativos</div><div class="col-md-2">{{$key->preservativo}}</div>
  <div class="col-md-2">Tipo</div><div class="col-md-4">{{$key->preser_tipo}}</div>
</div>
<?php endforeach; ?>
<?php $results = DB::table('paciente')->where('ced_paciente', $cedula)->get(); 
foreach ($results as $key):
?>
<label class="col-md-12">4. AUTORIZACION</label>
<div class="form-group">
  <div class="col-md-12">
  Yo {{$key->nombres." ".$key->apellidos}} Titular de la cedula de identidad Nª {{$key->ced_paciente}} Autorizo la realizacion de la prueba Elisa para la pesquiza del HIV
</div>
<div class="form-group">
  <div class="col-md-12">
<p class="text-right">Firma _______________________</p></div>
</div>
</div>
<?php endforeach; ?>
<LABEL class="col-md-12"><p class="text-center">FLUJOGRAMA Y CONTROL DE RECEPCION Y ENVIO DE MUESTRAS</p></LABEL>

<div class="form-group">
<div class="col-md-6">Fecha de toma de Muestra: ________________</div>
<div class="col-md-6">Fecha de envio a Epidemiologia: ________________</div>
</div>

<div class="form-group">
<div class="col-md-6"><p>Fecha de envio a epidemiologia regional: ________________</p></div>
<div class="col-md-6"><p>Fecha de envio al laboratorio de salud publica: ________________</p></div>
</div>

<div class="form-group">
  <div class="col-md-6">Fecha de envio INH: ________________</div>
  <div class="col-md-6">Fecha del resultado INH: ________________</div>
</div>

<div class="form-group">
  <div class="col-md-12">Responsable del llenado de la ficha: _______________________________________________________</div>
</div>

<br>

<div class="form-group">
<div class="col-md-6">Resultado VDLR _____________</div>
<div class="col-md-6">Fecha de envio INH _____________</div>
</div>

<div class="form-group">

  <div class="col-md-6">Fecha resultado INH _____________</div>

  <div class="col-md-6">Observaciones: _____________</div>


</div>
</div>

<p class="text-center"><button onclick="window.print();" class="hidden-print btn btn-info" id="btnprint">Presione aqui para imprimir la planilla</button>
</p>

<?php endif; ?>

<?php if($tiene==0): ?>

<div class="alert alert-danger">Esta persona no tiene una consulta pre-natal previa</div>

<?php endif; ?>

@stop