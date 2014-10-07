@extends('layouts.master')

@section('content')




@if(Session::has('Mensaje_error'))<div class="col-md-12 alert alert-danger">
{{Session::get('Mensaje_error')}}
</div>@endif


<br><br>

{{ Form::open(array('url'=> 'login/olvidar','class' => 'form-horizontal')) }}


<div class="form-group">

{{ Form::label('username', 'Nombre de usuario', array('class'=>'col-md-2')) }}
<div class="col-md-10">
{{ Form::text('username', Input::old('username'),array('class' => 'form-control')) }}
</div></div>

<div class="form-group">
{{ Form::label('pregunta','Pregunta secreta', array('class'=>'col-md-2')) }}

<div class="col-md-4">
       <select name="pregunta" id="pregunta" class="form-control">
           <option>Color favorito</option>
           <option>Nombre de la madre</option>
           <option>Nombre del padre</option>
           <option>Primer colegio</option>
           <option>Primer telefono</option>
       </select>

</div>

{{ Form::label('respuesta','Respuesta', array('class'=>'col-md-2')) }}

<div class="col-md-4">
{{ Form::text('respuesta', Input::old('respuesta'),array('class' => 'form-control')) }}
</div>


</div>


<div class="col-md-5 col-md-offset-5">
{{ Form::submit('Recuperar contraseña', array('class' => 'btn btn-info')) }}
</div>
<br></br>
{{ Form::close() }}

{{-- Preguntamos si hay algun mensaje de error y los mostramos --}}

<div class="col-md-6 col-md-offset-3">
Para volver al menu de login presione aqui: {{ @HTML::link('login', 'Login') }}
</div>
@stop
