<?php
namespace App\Controllers;
use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
use Helpers\Password;
use Helpers\Csrf;

class User extends Controller{

	private $users;

	public function __construct(){
		parent::__construct();
		$this->users = new \App\Models\Users();
	}

	public function login(){
		$username = $_POST['username'];
		if(Session::get('username')){
			Url::redirect('admin/~dashboard');
		}

		$data = $this->users->getMemberHash($username);

		if(!Csrf::isTokenValid('token')){
			$error = 'Mã chống crsf không đúng, xin vui lòng Ctrl + F5 để refresh lại trang';
		}

		if(Password::verify($_POST['password'], $data[0]->password)){
				$token = uniqid();
				$updata = array('token'=>Session::get('token'));
				$where = array('id'=>$data[0]->id);
				$this->users->update($updata,$where);
				Session::set('adminId',$data[0]->id);
				Session::set('username',$data[0]->username);
				Session::set('fullname',$data[0]->fullname);
				Url::redirect('admin/~dashboard');
			} else {
				$error = 'Sai tên đăng nhập hoặc mật khẩu, hoặc tài khoản của bạn chưa được kích hoạt';
		}

		//echo uniqid();
		$data['title'] = 'Đăng nhập';
		$data['error'] = $error;
		View::renderTemplate('header', $data,'login');
        View::render('Login/Login', $data);
        View::renderTemplate('footer', $data,'login');
	}

	public function logout(){
		Session::destroy();
		Url::redirect('admin/login');
	}

	public function displayUsers(){
		if(!Session::get('username')){
			echo json_encode(array('error' => 'Không thể thực hiện được lệnh này'));
		}else{
			echo json_encode($this->users->getAllUsers());
		}
	}

	public function create(){
		$message = null;
		$username = $_POST['username'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$fullname = $_POST['fullName'];
		$active = $_POST['active'];
		$token = $_POST['token'];

		if($token !== Session::get('token') || $token === ''){
			$message = array('message' => 'Sai mã token');
        }else{
        	$obj = array('username'=>htmlspecialchars($username),'password'=>htmlspecialchars(Password::make($password)),'email'=>htmlspecialchars($email),'fullname'=>htmlspecialchars($fullname),'active'=>htmlspecialchars($active));
        	if($this->users->add($obj) === true){
        		$message = array('message' => 'Tạo user thành công');
        	}else{
        		$message = array('message' => 'Tạo user thất bại');
        	}
        }
        echo json_encode($message);
	}

	public function checkUsername(){
		$username = $_GET['username'];
		echo json_encode($this->users->checkUsername($username));
	}

	public function checkEmail(){
		$email = $_GET['email'];
		$oldEmail = $_GET['oldEmail'];
		echo json_encode($this->users->checkEmail($email,$oldEmail));
	}

	public function delete(){
		$id = $_POST['id'];
		$token = $_POST['token'];

		if($token !== Session::get('token') || $token === ''){
			echo json_encode(false);
        }else{
        	echo json_encode($this->users->delete($id));
        }

	}

	public function edit(){
		$message = null;
		$id = $_POST['id'];
		$token = $_POST['token'];
		$email = $_POST['email'];
		$active = $_POST['active'];
		$fullname = $_POST['fullName'];

		if($token !== Session::get('token') || $token === ''){
			$message = array('message' => 'Sai mã token');
        }else{
        	$obj=array('email'=>htmlspecialchars($email),'fullname'=>htmlspecialchars($fullname),'active'=>htmlspecialchars($active));
        	$where = array('id'=>$id);
        	if($this->users->update($obj,$where) === true){
        		$message = array('message' => 'Tạo user thành công');
        	}else{
        		$message = array('message' => 'Tạo user thất bại');
        	}
        }
        echo json_encode($message);
	}

}