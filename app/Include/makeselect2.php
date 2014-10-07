<?php
	$idpais = $_GET['pais'];
$sql = DB::select('select * from municipio where id_estado = ?', array($idpais));


	echo '<select id="municnac" name="municnac">';
	foreach ($sql as $key) {
    echo "<option value=".$key->cod_municipio.">".$key->nombre."</option>";
                }
	
	echo '</select>';



?>
