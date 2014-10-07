@extends('layouts.master')

@section('content')

{{-- Preguntamos si hay algun mensaje de error y los mostramos --}}
@if(Session::has('Mensaje_error'))
<div class="col-md-12 alert alert-danger">
{{Session::get('Mensaje_error')}}
</div>
@endif


<div class="col-md-12 col-md-offset-1">
{{ Form::open(array('url'=> 'login','class' => 'form-horizontal')) }}

<div class="form-group">
{{ Form::label('Usuario', 'Nombre de usuario', array('class'=>'col-md-2')) }}
<div class="input-group input-group-lg col-md-6">
  <span class="input-group-addon glyphicon glyphicon-user"></span>
{{ Form::text('username', Input::old('username'),array('class' => 'form-control','placeholder' => 'Nombre de usuario')) }}
</div>
</div>

<div class="form-group">
{{ Form::label('Contraseña','Contraseña', array('class'=>'col-md-2')) }}
<div class="input-group input-group-lg col-md-6">
  <span class="input-group-addon glyphicon glyphicon-edit"></span>
  {{ Form::password('contrasena', array('class' => 'form-control','placeholder' => 'Contraseña')) }}
</div>
</div>


<div class="col-md-5 col-md-offset-3">
{{ Form::submit('Entrar', array('class' => 'btn btn-info')) }}
</div>
<br></br>
{{ Form::close() }}
</div>
<div class="col-md-6 col-md-offset-3">
Si olvido su contraseña presione aqui: {{ @HTML::link('login/olvidar', 'Olvide mi contaseña') }}
</div>
@stop
