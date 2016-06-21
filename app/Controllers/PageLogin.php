<?php
namespace App\Controllers;
use Core\View;
use Core\Controller;
use Core\Language;
use Helpers\Session;
use Helpers\Url;
use Helpers\Csrf;

class PageLogin extends Controller {	

	public function __construct()
    {
        parent::__construct();
    }
    //Home index
    public function login(){
        $data['title'] = 'Đăng nhập';
        $data['token'] = Csrf::makeToken('token');
    	View::renderTemplate('header', $data,'Login');
        View::render('Login/Login', $data);
        View::renderTemplate('footer', $data,'Login');
    }
}