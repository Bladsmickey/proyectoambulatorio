@extends('layouts.master')

@section('content')

    {{ Form::open(array('url' => 'login/crear', 'class'=>'form-horizontal')) }}

<div class="form-group">

        <label class="col-md-2">Nombres</label>

<div class="col-md-4">
        {{ Form::text('nombres', Input::old('nombres'), array('class' => 'form-control')) }}
</div>

        <label class="col-md-2">Apellidos</label>
<div class="col-md-4">
        {{ Form::text('apellidos', Input::old('apellidos'),array('class' => 'form-control')) }}</div>
</div>       


<div class="form-group">
        <label class="col-md-2">Nombre de usuario</label>
<div class="col-md-10">
        {{ Form::text('username', Input::old('username'),array('class' => 'form-control')) }}
</div></div>
<div class="form-group">

        <label class="col-md-2">Contraseña</label>
<div class="col-md-4">
        {{ Form::password('password',array('class' => 'form-control')) }}

</div>
        <label class="col-md-2">Confirmar contraseña</label>
<div class="col-md-4">
        {{ Form::password('cpassword',array('class' => 'form-control')) }}</div>

</div>


<div class="form-group">

        <label class="col-md-2">Pregunta secreta</label>
<div class="col-md-4">
       <select name="pregunta" id="pregunta" class="form-control">
           <option>Color favorito</option>
           <option>Nombre de la madre</option>
           <option>Nombre del padre</option>
           <option>Primer colegio</option>
           <option>Primer telefono</option>
       </select>

</div>
        <label class="col-md-2">Respuesta</label>
<div class="col-md-4">
               {{ Form::text('respuesta', Input::old('respuesta'),array('class' => 'form-control')) }}</div>

</div>

<div class="form-group">

        <label class="col-md-4">Nivel de usuario</label>
<div class="col-md-8">
       <select name="nivelusu" id="nivelusu" class="form-control">
           <option>Director</option>
           <option>Secretaria</option>
           <option>Jefa de enfermaria</option>
       </select>

</div>

</div>



<p class="text-center">
        {{ Form::submit('Registrar',array('class' => 'btn btn-primary')) }}
</p>
    {{ Form::close() }}


@if ($errors->any())
    <div class="col-md-12">
        
<div class="alert alert-danger"><?php
if ($errors->has('password'))
{
    echo "La contraseña debe tener al menos 6 caracteres<br>";
}

if ($errors->has('cpassword'))
{
    echo "La contraseñas deben coincidir<br>";
}

if ($errors->has('username'))
{
    echo "El nombre de usuario esta tomado<br>";
}

?></div>

    </div>

@endif

@stop