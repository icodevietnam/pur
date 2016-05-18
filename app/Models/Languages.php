<?php
namespace app\Models;

use app\Models\Commons;

class Languages extends Commons
{
	
	function __construct()
	{
		parrent::__construct('languages');
	}
}