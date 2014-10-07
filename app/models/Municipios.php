<?php
class Municipios extends \Eloquent {
	protected $table = 'municipio';
	protected $primaryKey = 'cod_municipio';


		public function parroquia()
	{
		 return $this->hasMany('parroquia','cod_municipio');
	}
 
	public function estados()
	{
		 return $this->belongsTo('Estado');
	}
 
}

?>