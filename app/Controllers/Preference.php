<?php
namespace App\Controllers;
use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
use Helpers\Password;
use Helpers\Csrf;

class Preference extends Controller{
	private $preferences;

	public function __construct(){
		parent::__construct();
		$this->preferences = new \App\Models\Preferences();
	}

}