<?php
class Parroquia extends \Eloquent {
	protected $table = 'parroquia';
	protected $primaryKey = 'cod_parroquia';
 
	public function parroquias()
	{
		 return $this->belongsTo('Municipios');
	}
 
}

?>