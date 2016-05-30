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

	public function create(){
		$message = null;
		$name = $_POST['name'];
		$description = $_POST['description'];
		$icon = $_POST['icon'];
		$active = $_POST['active'];
		$token = $_POST['token'];

		if($token !== Session::get('token') || $token === ''){
			$message = array('message' => 'Sai mã token');
        }else{
        	$obj = array('name'=>htmlspecialchars($name),'description'=>htmlspecialchars($description),'icon'=>htmlspecialchars($icon));
        	if($this->roles->add($obj) === true){
        		$message = array('message' => 'Tạo user thành công');
        	}else{
        		$message = array('message' => 'Tạo user thất bại');
        	}
        }
        echo json_encode($message);
	}

	public function delete(){
		$id = $_POST['id'];
		$token = $_POST['token'];

		if($token !== Session::get('token') || $token === ''){
			echo json_encode(false);
        }else{
        	echo json_encode($this->roles->delete($id));
        }

	}
}