<?php
namespace app\Models;

use \App\Models\Commons;

class ShopInfos extends Commons
{
	private $tableName; 
	
	function __construct()
	{
		$this->tableName = 'preferences';
		parent::__construct($this->tableName);
	}

}