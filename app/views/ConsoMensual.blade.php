@extends('layouts.master')

@section('content')


<div id="imprimir" class="visible-print-block">

  <div class="col-md-12">
    <p class="text-center">
{{ HTML::image("img/gobierno.png", "imagen",array('width'=>'100%','height'=>'100px','class'=>'img-responsive')) }}
</p></div>

<div class="col-md-12">
  <h4><p class="text-center">Consolidado mensual de seguimiento y evaluacion programa materno infantil <br> MUNICIPIO LEONARDO INFANTE Mes {{ date('M') }}</p></h4>
</div>

<table class="table table-bordered">
<thead>
<tr>
    <th>Indicadores</th>
    <th>Total Mensual</th>

  </tr>
</thead>
<tbody>
<tr>
  <td>Embarazadas captadas y reportadas a la red ambulatoria</td>
  <td></td>
</tr>

<tr>
  <td>Total de consultas prenatales</td>
  <td></td>
</tr>

<tr>
  <td>Prenatales nuevas inscritas < 19 años</td>
  <td></td>
</tr>
<tr>
  <td>Prenatales nuevas inscritas > 19 años</td>
  <td></td>
</tr>

<tr>
  <td>PN captadas < 13 semanas</td>
  <td></td>
</tr>

<tr>
  <td>PN Adolescentes < 15 años</td>
  <td></td>
</tr>
<tr>
  <td>Adolescentes embarazadas de 10 años</td>
  <td></td>
</tr>

<tr>
  <td>Adolescentes embarazadas de 11 años</td>
  <td></td>
</tr>

<tr>
  <td>
Adolescentes embarazadas de 12 años</td>
  <td></td>
</tr>


<tr>
  <td>Adolescentes embarazadas de 13 años</td>
  <td></td>
</tr>


<tr>
  <td>Adolescentes embarazadas de 14 años</td>
  <td></td>
</tr>


<tr>
  <td>Adolescentes embarazadas de 15 años</td>
  <td></td>
</tr>


<tr>
  <td>Adolescentes embarazadas de 16 años</td>
  <td></td>
</tr>


<tr>
  <td>Adolescentes embarazadas de 17 años</td>
  <td></td>
</tr>


<tr>
  <td>Adolescentes embarazadas de 18 años</td>
  <td></td>
</tr>


<tr>
  <td>ARO I</td>
  <td></td>
</tr>


<tr>
  <td>ARO II</td>
  <td></td>
</tr>


<tr>
  <td>ARO III</td>
  <td></td>
</tr>


<tr>
  <td>Total ARO</td>
  <td></td>
</tr>


<tr>
  <td>Muestras tomadas VDLR</td>
  <td></td>
</tr>


<tr>
  <td>Muestras VDRL positiva</td>
  <td></td>
</tr>


<tr>
  <td>Muestras tomadas HIV</td>
  <td></td>
</tr>


<tr>
  <td>Muestras HIV positivas</td>
  <td></td>
</tr>


<tr>
  <td>Acido Folico entregado</td>
  <td></td>
</tr>


<tr>
  <td>Hierro entregado</td>
  <td></td>
</tr>


<tr>
  <td>Polivitaminicos entregados</td>
  <td></td>
</tr>

<tr>
  <td>Toxoide tetanico embarazadas</td>
  <td></td>
</tr>


<tr>
  <td>Total Post-Natales atendidas</td>
  <td></td>
</tr>


<tr>
  <td>Post-natales < 19 años</td>
  <td></td>
</tr>


<tr>
  <td>Post-natales > 19 años</td>
  <td></td>
</tr>


<tr>
  <td>Post-natales evaluadas < 7 dias despues del parto</td>
  <td></td>
</tr>


<tr>
  <td>Numero de citologias tomadas</td>
  <td></td>
</tr>


<tr>
  <td>Muertes maternas</td>
  <td></td>
</tr>


<tr>
  <td>Total de partos atendidos hospitalarios</td>
  <td></td>
</tr>


<tr>
  <td>Partos en < 19 años</td>
  <td></td>
</tr>


<tr>
  <td>Partos en > 19 años</td>
  <td></td>
</tr>


<tr>
  <td>N° RN prematuros</td>
  <td></td>
</tr>


<tr>
  <td>Cesareas realizadas en hospitales</td>
  <td></td>
</tr>


<tr>
  <td>Abortos atendidos</td>
  <td></td>
</tr>


<tr>
  <td>Legrados realizados</td>
  <td></td>
</tr>


<tr>
  <td>Legrados en < 19 años</td>
  <td></td>
</tr>


<tr>
  <td>Legrados en > 19 años</td>
  <td></td>
</tr>


<tr>
  <td>Total consultas de planificacion familiar</td>
  <td></td>
</tr>


<tr>
  <td>Planificacion familiar < 19 años</td>
  <td></td>
</tr>


<tr>
  <td>Planificacion familiar > 19 años</td>
  <td></td>
</tr>


<tr>
  <td>Anticonceptivos orales combinados</td>
  <td></td>
</tr>


<tr>
  <td>Anticonceptivos progestaneos</td>
  <td></td>
</tr>


<tr>
  <td>Inyectables mensuales</td>
  <td></td>
</tr>


<tr>
  <td>Condones masculinos</td>
  <td></td>
</tr>


<tr>
  <td>Condones Femeninos</td>
  <td></td>
</tr>


<tr>
  <td>DIU</td>
  <td></td>
</tr>


<tr>
  <td>Implantes sub-dermicos</td>
  <td></td>
</tr>


<tr>
  <td>Anticonceptivos de emergencia</td>
  <td></td>
</tr>


<tr>
  <td>N° casos atendidos por violencia > 19 años</td>
  <td></td>
</tr>


<tr>
  <td>Intrafamiliar</td>
  <td></td>
</tr>


<tr>
  <td>Abuso Sexual</td>
  <td></td>
</tr>


<tr>
  <td>Otra causa</td>
  <td></td>
</tr>


<tr>
  <td>N° de recien nacidos con lactancia materna en los primeros 30 minutos de vida (apego precoz)</td>
  <td></td>
</tr>


<tr>
  <td>N° de recien nacidos con lactancia materna exclusiva en < 6 meses</td>
  <td></td>
</tr>


<tr>
  <td>N° de recien nacidos con lactancia materna exclusiva en > 6 meses</td>
  <td></td>
</tr>


<tr>
  <td>N° de recien nacidos con lactancia materna hasta los 2 años o mas</td>
  <td></td>
</tr>


<tr>
  <td>N° de adolescentes atendidos con primeras consultas</td>
  <td></td>
</tr>


<tr>
  <td>N° de adolescentes atendidos consultas sucesivas</td>
  <td></td>
</tr>


<tr>
  <td>N° de adolescentes informados y orientados</td>
  <td></td>
</tr>

<tr>
  <td>N° de adolescentes estudiando</td>
  <td></td>
</tr>


<tr>
  <td>N° de adolescentes trabajando</td>
  <td></td>
</tr>


<tr>
  <td>N° de adolescentes  con desercion escolar</td>
  <td></td>
</tr>


<tr>
  <td>Total de consultas de 0-1 año</td>
  <td></td>
</tr>



<tr>
  <td>Primeras consultas 0-1 año</td>
  <td></td>
</tr>



<tr>
  <td>Total de consultas de 2-3 años</td>
  <td></td>
</tr>



<tr>
  <td>Primeras consultas 2-3 años</td>
  <td></td>
</tr>



<tr>
  <td>Total consultas sucesivas 4-6 años</td>
  <td></td>
</tr>



<tr>
  <td>Consultas sucesivas 4-6 años</td>
  <td></td>
</tr>



<tr>
  <td>Total de consultas 7-9 años</td>
  <td></td>
</tr>



<tr>
  <td>Primeras consultas 7-9 años</td>
  <td></td>
</tr>



<tr>
  <td>Total de consultas 10-19 años</td>
  <td></td>
</tr>



<tr>
  <td>Primeras consultas 10-19 años</td>
  <td></td>
</tr>

</tbody>

</table>

</div>


<p class="text-center"><button onclick="window.print();" class="hidden-print btn btn-info" id="btnprint">Presione aqui para imprimir la planilla</button>
</p>


@stop



