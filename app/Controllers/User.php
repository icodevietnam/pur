<?php
namespace App\Controllers;
use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
use Helpers\Password;

class User extends Controller{

	private $users;

	public function __construct(){
		parent::__construct();
		$this->users = new \App\Models\Users();
	}

	public function login(){
		$username = $_POST['username'];
		if(Session::get('admin') === true){
			Url::redirect('admin/~dashboard');
		}

		$data = $this->users->getMemberHash($username);

		if(Password::verify($_POST['password'], $data[0]->password)){
				$token = uniqid();
				$updata = array('token'=>$token);
				$where = array('id'=>$data[0]->id);
				$this->users->update($updata,$where);
				Session::set('adminId',$data[0]->id);
				Session::set('username',$data[0]->username);
				Session::set('fullname',$data[0]->fullname);
				Session::set("token",$token);
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
}