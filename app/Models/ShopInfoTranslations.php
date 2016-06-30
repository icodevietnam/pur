<?php
namespace app\Models;

use \App\Models\Commons;

class ShopInfoTranslations extends Commons
{
	private $tableName; 
	
	function __construct()
	{
		$this->tableName = 'shopinfo_translations';
		parent::__construct($this->tableName);
	}

}