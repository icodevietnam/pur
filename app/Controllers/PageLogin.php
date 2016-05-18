<?php
namespace App\Controllers;
use Core\View;
use Core\Controller;
use Core\Language;
use Helpers\Session;
use Helpers\Url;

class PageLogin extends Controller {	

	public function __construct()
    {
        parent::__construct();
    }
    //Home index
    public function login(){
        $data['title'] = 'Đăng nhập';
    	View::renderTemplate('header', $data,'login');
        View::render('Login/Login', $data);
        View::renderTemplate('footer', $data,'login');
    }
}