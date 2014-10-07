<?php

class ControladorReportes extends BaseController{

public function GenerarProgPre(){

$cedula=Input::get('cedula');
return View::make('Progpre')->with('cedula', '$id');

}

public function relpaldoBDD(){

$dbhost = 'localhost';
$dbname = 'ambulatorio';
$dbuser = 'root';
$dbpass = 'localhost';

$backup_file = $dbname . date("Y-m-d-H-i-s") . '.sql';

// comandos a ejecutar
$command = "mysqldump --opt -h $dbhost -u $dbuser -p$dbpass $dbname  > backup/$backup_file";

// ejecución y salida de éxito o errores
shell_exec($command);

if (file_exists("backup/".$backup_file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename='.basename($backup_file));
    flush();
    readfile("backup/".$backup_file);
   
}
$cambioso=$backup_file;
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Respaldo de la Base de Datos',
'cambio' =>$cambioso,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);

 exit;

}


public function resturarBDD(){

$dbhost = 'localhost';
$dbname = 'ambulatorio';
$dbuser = 'root';
$dbpass = 'localhost';
$archivo = Input::file('bdd');
$destino="public/";
$nombre="hola.sql";
$archivo->move($destino, $nombre);
$archivorestaurar="public/hola.sql";
$ejecutar="mysql -u $dbuser -p$dbpass $dbname < $archivorestaurar";
shell_exec($ejecutar);

$cambioso=$archivo;
$fecha= date('Y-m-d');
$usuario=Auth::user()->username;	
$bitacora=array(
'id' =>null,
'usuario' =>$usuario,
'tipocambio' =>'Restauracion de la Base de Datos',
'cambio' =>$cambioso,
'fecha'=>$fecha,
);
registrar::GuardarBitacora($bitacora);

return Redirect::to('basedd')
                            ->with('Mensaje_error', 'BDD restaurada con exito');



}



}


?>