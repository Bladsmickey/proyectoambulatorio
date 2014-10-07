@extends('layouts.master')

@section('content')



  

<div class="col-md-12">
@if ($errors->any())
<div class="alert alert-success" role="alert">
<p class="text-center">{{ implode('', $errors->all(':message')) }}</p>
</div>
@endif

<div class="col-md-6">
        <h4><p class="text-center"><b>Usuarios habilitados</b></p></h4>
     {{ Form::open(array('url' => 'deshabilitarusu', 'class'=>'form-horizontal')) }}
<?php $results = DB::table('Usuarios')->where('habil', '1')->get();
foreach ($results as $result)
{
echo '<label class="checkbox-inline">';
echo "<td><input name='usu[]' id='usu[]' type='checkbox' value='".$result->username."'></td><td>".$result->nombres."</td>. - <td>".$result->apellidos."</td>";
echo '</label>';
echo '<br>    <br>';
}?>

<p class="text-center"> {{ Form::submit('Deshabilitar Usuarios',array('class' => 'btn btn-danger')) }}</p>
      {{ Form::close() }}
</div>


<div class="col-md-6">
        <h4><p class="text-center"><b>Usuarios Deshabilitados</b></p></h4>
     {{ Form::open(array('url' => 'habilitarusu', 'class'=>'form-horizontal')) }}
<?php $results = DB::table('Usuarios')->where('habil', '0')->get();
foreach ($results as $result)
{
echo '<label class="checkbox-inline">';
echo "<td><input name='usu[]' id='usu[]' type='checkbox' value='".$result->username."'></td><td>".$result->nombres."</td>. - <td>".$result->apellidos."</td>";
echo '</label>';
echo '<br>    <br>';
}?>

<p class="text-center"> {{ Form::submit('Habilitar Usuarios',array('class' => 'btn btn-success')) }}</p>
      {{ Form::close() }}
</div>






</div>

@stop