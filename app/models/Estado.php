
<?php
class Estado extends \Eloquent {
	protected $table = 'estado';
	protected $primaryKey = 'cod_estado';


	public function municipio()
	{
		 return $this->hasMany('municipios','cod_estado');
	}

}

?>