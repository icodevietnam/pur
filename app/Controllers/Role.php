<?php
namespace App\Controllers;
use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
use Helpers\Password;
use Helpers\Csrf;

class Role extends Controller{

	private $roles;

	public function __construct(){
		parent::__construct();
		$this->roles = new \App\Models\Roles();
	}

	public function displayRoles(){
		if(!Session::get('username')){
			echo json_encode(array('error' => 'Không thể thực hiện được lệnh này'));
		}else{
			echo json_encode($this->roles->getAll());
		}
	}
}