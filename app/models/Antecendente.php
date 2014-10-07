
<?php
class Antecendente extends \Eloquent {
	protected $table = 'antecedente';
	protected $primaryKey = 'cod_antecedente';

return DB::table('antecedente')->where('cod_antecedente', cod_antecedente)->get();

}

?>