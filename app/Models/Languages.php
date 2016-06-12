<?php
namespace app\Models;

use \App\Models\Commons;

class Languages extends Commons
{
	private $tableName; 
	
	function __construct()
	{
		$this->tableName = 'languages';
		parent::__construct($this->tableName);
	}

	public function checkCode($code,$oldCode){
		$data = null;
		$para = null;
		try {
			$query = 'SELECT * FROM '.PREFIX.$this->tableName.' WHERE code =:code';
			$para = array(':code' => $code);
			if(null != $oldCode || '' === $oldCode){
				$query= $query.(" AND code <> :oldCode ");
				$para = array(':code'=>$code,':oldCode'=>$oldCode);
			}
			$data = $this->db->select($query,$para);
			if(count($data) >= 1){
				return false;
			}else{
				return true;
			}
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return true;
		}
	}
	
}