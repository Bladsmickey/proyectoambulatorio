@extends('layouts.master')

@section('content')

{{var_dump(Auth::user()->username);
}}
    {{ Datatable::table()
    ->addColumn('N°','Usuario','Tipo de cambio','Registro afectado','Fecha')  
    ->setUrl(route('datatables'))
    ->render() 
    }}



@stop