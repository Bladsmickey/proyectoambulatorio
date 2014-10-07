<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
    {{ HTML::style('css/bootstrap.css', array('media' => 'screen')); }}
    {{ HTML::style('css/dataTables.bootstrap.css', array('media' => 'screen')); }}
    {{ HTML::style('css/print.css', array('media' => 'print')) }}
    {{ HTML::script('js/jquery-2.1.1.min.js'); }}
    {{ HTML::script('js/bootstrap.min.js'); }}
    {{ HTML::script('js/jquery.dataTables.min.js'); }}
    {{ HTML::script('js/dataTables.bootstrap.js'); }}
    <style>
body { padding-bottom: 3%;
background: #99D9EA;
 }

 .clickable
{
    cursor: pointer;
}

.clickable #glypho
{
    background: rgba(0, 0, 0, 0.15);
    display: inline-block;
    padding: 6px 12px;
    border-radius: 4px
}

.panel-heading span
{
    margin-top: -23px;
    font-size: 15px;
    margin-right: -9px;
}
a.clickable { color: inherit; }
a.clickable:hover { text-decoration:none; }

</style>
</head>
<body>

	<div class="container">

<div class="col-md-12" id="header">@include('header')</div>


<div id="barralateral" class="col-md-3 hidden-print" >
<?php if(Auth::check ()): ?>

{{-- menu busqueda --}}

  <div class="col-md-12">
      {{ Form::open(array('url' => 'busqueda', 'class'=>'form-horizontal')) }}
      <input type="hidden" name="ficha" id="ficha" value="1">

<div class="col-md-8"><input  type="text" class="form-control" id="busqueda" name="cedula" data-toggle="tooltip" data-placement="top" title="Introduzca nombre o cedula a buscar"></div>

    

       <button type="submit" class="btn btn-primary"> <span class="glyphicon glyphicon-search"></span></button>

      {{ Form::close() }}

  </div>

{{-- fin menu busqueda --}}

<br></br>


{{-- Menu Nuevo --}}

<div class="col-md-12">
<div class="panel panel-primary">
                <div class="panel-heading clickable">
 <h3 class="panel-title">
 <span class="glyphicon glyphicon-user"> </span>{{ @HTML::link('nuevo/paciente', ' Nuevo paciente') }}</h3>

                </div>

            </div>
       </div>


  {{-- fin Menu Nuevo --}}   


{{-- Menu Reportes --}}




<div class="col-md-12">
<div class="panel panel-primary">
                <div class="panel-heading clickable"> <h3 class="panel-title">
                       <span class="glyphicon glyphicon-book"> Reportes</span> </h3>
                    <span class="pull-right "><i id="glypho" class="glyphicon glyphicon-minus"></i></span>
                </div>
                <div class="panel-body">

       <span class="glyphicon glyphicon-file"></span>{{ @HTML::link('reportes/reporteprogpre', ' Programa de prevencion') }}<br>
       <span class="glyphicon glyphicon-list-alt"></span> {{ @HTML::link('reportes/segusu', ' Seguimiento de paciente') }}<br>
       <span class="glyphicon glyphicon-align-justify"></span> {{ @HTML::link('reportes/conmen', ' Consolidado Mensual') }}<br>
       <span class="glyphicon glyphicon-tasks"></span><a href="#"> Inmunizacion</a></li><br>


               </div>
            </div>
       </div>


{{-- fin Menu Reportes --}}


{{-- Menu Gestion --}}





<div class="col-md-12">
<div class="panel panel-primary">
                <div class="panel-heading clickable"> <h3 class="panel-title">
                     <span class="glyphicon glyphicon-info-sign"> Gestion</span></h3>
                    <span class="pull-right "><i id="glypho" class="glyphicon glyphicon-minus"></i></span>
                </div>
                <div class="panel-body">

       <span class="glyphicon glyphicon-certificate"></span>{{ @HTML::link('gestion/enfcond', ' Enfermedades o condiciones') }}<br>
       <span class="glyphicon glyphicon-ok-sign"></span>{{ @HTML::link('gestion/vacuna', ' Vacunas') }}<br>
       <span class="glyphicon glyphicon-warning-sign"></span>{{ @HTML::link('gestion/medicamentos', ' Medicamentos') }}<br>
       <span class="glyphicon glyphicon-eye-close"></span>{{ @HTML::link('gestion/antecedente', ' Antecedentes') }}<br>



               </div>
            </div>
       </div>

{{-- fin Menu Gestion --}}


{{-- Menu administrador --}}



<div class="col-md-12">
<div class="panel panel-primary">
                <div class="panel-heading clickable"> <h3 class="panel-title">
                      <span class="glyphicon glyphicon-edit"> Administracion</span></h3>
                    <span class="pull-right "><i id="glypho" class="glyphicon glyphicon-minus"></i></span>
                </div>
                <div class="panel-body">

     <span class="glyphicon glyphicon-tags"></span> {{ @HTML::link('acercade', ' Acerca De') }}<br>
     <span class="glyphicon glyphicon-lock"></span> <a href="#">{{ @HTML::link('bitacora', ' Bitacora') }}</a><br>
     <span class="glyphicon glyphicon-file"></span> <a href="#"> Manual de usuario</a></li><br>
     <span class="glyphicon glyphicon-user"></span>  {{ @HTML::link('login/crear', ' Nuevo usuario') }}<br>
    <span class="glyphicon glyphicon-off"></span>  {{ @HTML::link('usuario/deshabilitar', ' Deshabilitar usuarios') }}<br>
    <span class="glyphicon glyphicon-user"></span>  {{ @HTML::link('basedd', ' Base de datos') }}<br>
     <span class="glyphicon glyphicon-off"></span>  {{ @HTML::link('logout', ' Cerrar sesion') }}<br>






               </div>
            </div>
       </div>

{{-- fin Menu administrador --}}

<?php endif; ?>

</div>






        <div class="col-md-9 well well-lg" id="contenido">
            @yield('content')
        </div>
   

<div class="col-md-12 navbar-static-bottom hidden-print" id="footer">
  <div class="container">
      <p class="text-center">Desarrollado por <b>Machado, Edgar.</b> <b>Del nogal, Joany.</b> <b>Taldone, Domingo.</b></p>
        </div></div>

</div>

<script>
  $('#busqueda').tooltip('show');
  $(document).on('click', '.panel div.clickable', function (e) {
    var $this = $(this);
    if (!$this.hasClass('panel-collapsed')) {
        $this.parents('.panel').find('.panel-body').slideUp();
        $this.addClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-minus').addClass('glyphicon-plus');
    } else {
        $this.parents('.panel').find('.panel-body').slideDown();
        $this.removeClass('panel-collapsed');
        $this.find('i').removeClass('glyphicon-plus').addClass('glyphicon-minus');
    }
});
$(document).ready(function () {
    $('.panel-heading span.clickable').click();
    $('.panel div.clickable').click();
});
</script>

<script>  
$('#agregarvacunas').on('hide.bs.modal', function (event) {
 var r = confirm("Seguro que desea cerrar la consulta?");
if (r == false) {
    event.preventDefault();

}

})
</script>

    </body>
</html>