@extends('layouts.master')

@section('content')

<style>
.btn-file {
    position: relative;
    overflow: hidden;
}
.btn-file input[type=file] {
    position: absolute;
    top: 0;
    right: 0;
    min-width: 100%;
    min-height: 100%;
    font-size: 100px;
    text-align: right;
    filter: alpha(opacity=0);
    opacity: 0;
    outline: none;
    background: white;
    cursor: inherit;
    display: block;
}
</style>


<div class="form-group">
	<h4>Menu de restauracion/respaldo de la base de datos, para continuar, seleccione una opcion.</h4>
<div class="col-md-6">
<div class="col-md-12">
<p class="text-center">Respaldar BDD</p></div>
<div class="col-md-12">
<a href="bdd">{{ HTML::image("img/backup.png", "imagen",array('width'=>'260px','height'=>'260px')) }}</a></div>

</div>

<div class="col-md-6">
<div class="col-md-12">
<p class="text-center">Restaurar BDD</p></div>
<div class="col-md-12">{{ HTML::image("img/restore.jpg", "imagen",array('width'=>'265px','height'=>'256px')) }}</div>

{{ Form::open(array('url' => 'bdd/restaurar', 'files' => true, 'class' => 'form-horizontal')) }}
<p class="text-center">
<span class="btn btn-default btn-file">
    Seleccionar archivo de respaldo <input type="file" name="bdd" id="bdd">
</span></p>
<p class="text-center">
{{ Form::submit('Restaurar BDD', array('class' => 'btn btn-info')) }}</p>
{{ Form::close() }}


</div>


@if(Session::has('Mensaje_error'))<div class="col-md-12 alert alert-danger">
{{Session::get('Mensaje_error')}}
</div>@endif


</div>


@stop
