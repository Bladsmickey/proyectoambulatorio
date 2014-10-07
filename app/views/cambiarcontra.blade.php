@extends('layouts.master')

@section('content')


<?php
	$username=Input::get('username');
?>

@if(Session::has('username'))
<?php$username=Session::get('username'); ?>
@endif


@if(Session::has('Mensaje_error'))
<div class="col-md-12 alert alert-danger">
{{Session::get('Mensaje_error')}}
</div>
@endif


<br><br>

{{ Form::open(array('url'=> 'cambiarcontra','class' => 'form-horizontal')) }}


<div class="form-group">
<input type="hidden" name="username" id="username" value="<?php echo $username; ?>">
        <label class="col-md-2">Contraseña</label>
<div class="col-md-4">
        {{ Form::password('password',array('class' => 'form-control')) }}

</div>
        <label class="col-md-2">Confirmar contraseña</label>
<div class="col-md-4">
        {{ Form::password('cpassword',array('class' => 'form-control')) }}</div>

</div>

<div class="col-md-5 col-md-offset-5">
{{ Form::submit('Cambiar contraseña', array('class' => 'btn btn-info')) }}
</div>
<br></br>
{{ Form::close() }}

{{-- Preguntamos si hay algun mensaje de error y los mostramos --}}

@stop
