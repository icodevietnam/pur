<?php
namespace app\Models;

use \App\Models\Commons;

class Products extends Commons
{
	private $tableName; 
	
	function __construct()
	{
		$this->tableName = 'products';
		parent::__construct($this->tableName);
	}

}