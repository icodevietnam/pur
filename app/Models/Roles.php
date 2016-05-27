<?php
namespace app\Models;

use \App\Models\Commons;

class Roles extends Commons
{
	private $tableName; 
	function __construct()
	{
		$this->tableName = 'roles';
		parent::__construct($this->tableName);
	}

}