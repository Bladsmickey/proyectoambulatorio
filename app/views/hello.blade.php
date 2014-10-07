@extends('layouts.master')

@section('content')

	<div class="col-md-12">
			<label class="col-md-6 col-md-offset-5">Hola! {{ Auth::user()->nombres; }} ({{ Auth::user()->tipo; }})</label>
			<div class="col-md-12 col-md-offset-2">
			<p>Para continuar, por favor seleccione una de las opciones a la izquierda.</p>
	</div></div>

@stop