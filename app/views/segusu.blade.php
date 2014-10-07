@extends('layouts.master')

@section('content')
<?php $pacientes=DB::table('paciente')->get();
?>
<div id="imprimir" class="visible-print-block">

  <div class="col-md-12">
    <p class="text-center">
{{ HTML::image("img/gobierno.png", "imagen",array('width'=>'100%','height'=>'100px','class'=>'img-responsive')) }}
</p></div>

<div class="col-md-12">
  <h4><p class="text-center">PROGRAMA SALUD SEXUAL Y REPRODUCTIVA <br> MUNICIPIO LEONARDO INFANTE AÑO {{ date('Y') }}</p></h4>
</div>


<table class="table table-bordered table-condensed table-responsive">
<thead>
  <tr>
    <td>Nª</td>
    <td colspan="4">Nombres y apellidos</td>
    <td>Edad</td>
    <td>C.I.N.V</td>
    <td rowspan="2" colspan="5">Plan familiar

 <table class="table">
  <tr>
    <td>P</td>
    <td>S</td>
    <td>GO</td>
    <td>DIU</td>
    <td>Citol

<table><tr><td>P</td>
<td>S</td></tr></table>

    </td>
  </tr>
</table>

</td>
    <td colspan="2">Nº de gesta</td>

    <td rowspan="2" colspan="15">Control prenatal


  <table class="table">
  <tr>
    <td>P</td>
    <td> <13 Sem </td>
    <td> >13 sem </td>
    <td> <19 sem </td>
    <td> >19 sem </td>
    <td> Sem gesta </td>
    <td>S</td>
    <td>ARO

<table><tr>
<td>BR</td>
<td>I</td>
<td>II</td>
<td>III</td></tr></table>

    </td>


    <td>VDRL

<table class="table"><tr><td>1er</td>
<td>2do</td></tr></table>

    </td>
    <td>HIV

<table class="table"><tr><td>1er</td>
<td>2do</td></tr></table>

    </td>
    <td>Citol

<table class="table"><tr><td>P</td>
<td>S</td></tr></table>

    </td>
    <td>Pat</td>
    <td>Acid fol</td>
    <td>Sulf fer</td>
    <td>Poli vit</td>
  </tr>
</table>


    </td>
    <td rowspan="2" colspan="7">Control post-natal

<table class="table">
  <tr>
    <td>P</td>
    <td><7 d</td>
    <td>>8 d</td>
    <td>S</td>
    <td>Acid fol</td>
    <td>Sulf fer</td>
    <td>Poli vit</td>
  </tr>
</table>

    </td>
</tr>
</thead>

{{-- --}}
<tbody>
<?php  foreach ($pacientes as $key): ?>
<?php $cedula=$key->ced_paciente; $prenatal=DB::table("prenatal")->where('ced_paciente',$cedula)->get(); ?>
<?php $cont=1; foreach ($prenatal as $keys): ?>

  <tr>

    <td>{{$cont}}</td>
    <td colspan="4">{{$key->nombres." ".$key->apellidos}}</td>
    <td>{{$key->edad}}</td>
    <td>{{$key->ced_paciente}}</td>
    
    <td colspan="5">
      
 <table class="table">
  <tr>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td>

<table>
  <tr>
    <td> </td>
    <td> </td>
  </tr>
</table>

    </td>
  </tr>
</table>


    </td>



    <td colspan="2">{{$keys->nro_gesta}}</td>
    
    <td colspan="15">
      
 <table class="table">
  <tr>
    <td> <?php if($keys->sem_gest < 13){echo "X";} ?></td>
    <td><?php if($keys->sem_gest > 13){echo "X";} ?> </td>
    <td> <?php if($key->edad < 19){echo "X";} ?> </td>
    <td> <?php if($key->edad > 19){echo "X";} ?> </td>
    <td> {{$keys->sem_gest}} </td>
    <td> </td>
    <td> </td>
    <td>

<table>
  <tr>
<td>   </td>
<td>   </td>
<td>   </td>
<td>   </td></tr>
</table>

    </td>


    <td>

<table class="table"><tr><td> </td>
<td> </td></tr></table>

    </td>
    <td>

<table class="table"><tr><td> </td>
<td> </td></tr></table>

    </td>
    <td>

<table class="table"><tr><td> </td>
<td> </td></tr></table>

    </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
</table>



    </td>



    <td colspan="7">
      
      <table class="table">
  <tr>
    <td>  </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
    <td> </td>
  </tr>
</table>



    </td>



</tr>
<?php endforeach; ?>
<?php $cont++; endforeach; ?>
</tbody>
</table>

{{-- --}}




</div>

<p class="text-center"><button onclick="window.print();" class="hidden-print btn btn-info" id="btnprint">Presione aqui para imprimir la planilla</button>
</p>
@stop
