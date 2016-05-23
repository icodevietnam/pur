<?php
namespace App\Controllers;
use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
use Helpers\Csrf;

class PageAdmin extends Controller {	

    private $users;

	public function __construct()
    {
        parent::__construct();
        if(Session::get('username') === null){
            Url::redirect('/admin/login');
        }
        $this->users = new \App\Models\Users();
    }
    //Dashboard index
    public function dashboard(){
    	$data['title'] = 'Bảng điều khiển';
        $data['key'] = 'general';
    	View::renderTemplate('header', $data,'admin');
        View::render('Admin/Dashboard', $data);
        View::renderTemplate('footer', $data,'admin');
    }

    //Preference index
    public function preference(){
        $data['title'] = 'Thông tin chung';
        $data['key'] = 'general';
        View::renderTemplate('header', $data,'admin');
        View::render('Admin/Preference', $data);
        View::renderTemplate('footer', $data,'admin');
    }
    
    //About us
    public function aboutUs(){
        $data['title'] = 'Về chúng tôi';
        $data['key'] = 'general';
        View::renderTemplate('header', $data,'admin');
        View::render('Admin/Preference', $data);
        View::renderTemplate('footer', $data,'admin');
    }

    public function language(){
        $data['title'] = 'Ngôn ngữ';
        $data['key'] = 'general';
        View::renderTemplate('header', $data,'admin');
        View::render('Admin/Language', $data);
        View::renderTemplate('footer', $data,'admin');
    }

    public function user(){
        $data['title'] = 'Người dùng';
        $data['key'] = 'user';
        $data['link'] = DIR.'admin/~user';
        View::renderTemplate('header', $data,'admin');
        View::render('Admin/User', $data);
        View::renderTemplate('footer', $data,'admin');
    }

    public function showInfo(){
        $id = $_GET['id'];
        $token = $_GET['token'];
        $object = $_GET['object'];
        $pagePath = '';

        if($token != Session::get('token') || $token === ''){
            Url::redirect('/admin/login');
        }

        if($object === 'users'){
            $data['title'] = 'Người dùng';
            $data['obj'] = $object;
            $data['link'] = DIR.'admin/~user';
            $pagePath = 'Admin/User/ShowInfo';
            $data['result'] = $this->users->getUserWithoutPassword($id);
        }

        View::renderTemplate('header', $data,'admin');
        View::render($pagePath,$data);
        View::renderTemplate('footer', $data,'admin');
    }

    public function createPage(){
        $token = $_GET['token'];
        $object = $_GET['object'];
        //$action = 'add';
        $pagePath = '';

        if($token != Session::get('token') || $token === ''){
            Url::redirect('/admin/login');
        }

        if($object === 'users'){
            $data['title'] = 'Người dùng';
            $data['obj'] = $object;
            $data['link'] = DIR.'admin/~user';
            $pagePath = 'Admin/User/EditUser';
        }

        View::renderTemplate('header', $data,'admin');
        View::render($pagePath,$data);
        View::renderTemplate('footer', $data,'admin');
    }

}