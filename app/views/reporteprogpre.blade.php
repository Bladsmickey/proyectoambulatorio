@extends('layouts.master')

@section('content')

<div class="col-md-12"><legend>Seleccione un usuario a buscar: </legend></div>


{{Form::open(array('url' => 'busqueda', 'class'=>'form-horizontal'))}}
<div class="form-group">
<label class="col-md-2">Cedula o nombre a buscar: </label><div class="col-md-10"><input type="text" name="cedula" id="cedula" class="form-control" placeholder="Ej: 20254789">
</div></div>
<input type="hidden" name="propre" id="propre" value="1">

<p class="text-center">
<input type="submit" value="Buscar" class="btn btn-primary"></p>
{{Form::close()
}}
@stop