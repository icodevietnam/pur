<?php
namespace App\Controllers;
use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
use Helpers\Csrf;

class PageAdmin extends Controller {	

    private $users;
    private $roles;

	public function __construct()
    {
        parent::__construct();
        if(Session::get('username') === null){
            Url::redirect('/admin/login');
        }
        $this->users = new \App\Models\Users();
        $this->roles = new \App\Models\Roles();
        $this->languages = new \App\Models\Languages();
    }
    //Dashboard index
    public function dashboard(){
    	$data['title'] = 'Bảng điều khiển';
        $data['key'] = 'general';
    	View::renderTemplate('header', $data,'Admin');
        View::render('Admin/Dashboard', $data);
        View::renderTemplate('footer', $data,'Admin');
    }

    //Preference index
    public function preference(){
        $data['title'] = 'Thông tin chung';
        $data['key'] = 'general';
        View::renderTemplate('header', $data,'Admin');
        View::render('Admin/Preference', $data);
        View::renderTemplate('footer', $data,'Admin');
    }

    //Shop Info
    public function shopInfo(){
        $data['title'] = 'Thông tin shop';
        $data['key'] = 'general';
        View::renderTemplate('header', $data,'Admin');
        View::render('Admin/shopInfo', $data);
        View::renderTemplate('footer', $data,'Admin');
    }
    
    //About us
    public function aboutUs(){
        $data['title'] = 'Về chúng tôi';
        $data['key'] = 'general';
        View::renderTemplate('header', $data,'Admin');
        View::render('Admin/Preference', $data);
        View::renderTemplate('footer', $data,'Admin');
    }

    public function language(){
        $data['title'] = 'Ngôn ngữ';
        $data['key'] = 'general';
        View::renderTemplate('header', $data,'Admin');
        View::render('Admin/Language', $data);
        View::renderTemplate('footer', $data,'Admin');
    }

    public function user(){
        $data['title'] = 'Người dùng';
        $data['key'] = 'user';
        View::renderTemplate('header', $data,'Admin');
        View::render('Admin/User', $data);
        View::renderTemplate('footer', $data,'Admin');
    }

    public function role(){
        $data['title'] = 'Quyền';
        $data['key'] = 'user';
        View::renderTemplate('header', $data,'Admin');
        View::render('Admin/Role', $data);
        View::renderTemplate('footer', $data,'Admin');
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
            $pagePath = 'Admin/User/ShowInfo';
            $data['result'] = $this->users->getUserWithoutPassword($id);
        }else if ($object === 'roles') {
            $data['title'] = 'Quyền';
            $data['obj'] = $object;
            $pagePath = 'Admin/Role/ShowInfo';
            $data['result'] = $this->roles->get($id);
        }else if($object === 'languages'){
            $data['title'] = 'Ngôn ngữ';
            $data['obj'] = $object;
            $pagePath = 'Admin/Language/ShowInfo';
            $data['result'] = $this->languages->get($id);
        }

        View::renderTemplate('header', $data,'Admin');
        View::render($pagePath,$data);
        View::renderTemplate('footer', $data,'Admin');
    }

    public function createPage(){
        $token = $_GET['token'];
        $object = $_GET['object'];
        //$action = 'add';
        $pagePath = '';

        if($token != Session::get('token') || $token === ''){
            Url::redirect('/Admin/login');
        }

        if($object === 'users'){
            $data['title'] = 'Người dùng';
            $data['obj'] = $object;
            $data['link'] = DIR.'Admin/~user';
            $data['roles'] = $this->roles->getAll();
            $pagePath = 'Admin/User/CreateUser';
        }else if($object === 'roles'){
            $data['title'] = 'Quyền';
            $data['obj'] = $object;
            $data['link'] = DIR.'Admin/~role';
            $pagePath = 'Admin/Role/CreateRole';
        }else if($object === 'languages'){
            $data['title'] = 'Ngôn ngữ';
            $data['obj'] = $object;
            $data['link'] = DIR.'Admin/~language';
            $pagePath = 'Admin/Language/CreateLanguage';
        }

        View::renderTemplate('header', $data,'Admin');
        View::render($pagePath,$data);
        View::renderTemplate('footer', $data,'Admin');
    }

    public function editPage(){
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
            $data['link'] = DIR.'Admin/~user';
            $pagePath = 'Admin/User/EditUser';
            $data['roles'] = $this->roles->getAll();
            $data['result'] = $this->users->getUserWithoutPassword($id);
        }else if($object === 'roles'){
            $data['title'] = 'Quyền';
            $data['obj'] = $object;
            $data['link'] = DIR.'Admin/~role';
            $pagePath = 'Admin/Role/EditRole';
            $data['result'] = $this->roles->get($id);
        }else if($object === 'languages'){
            $data['title'] = 'Ngôn ngữ';
            $data['obj'] = $object;
            $data['link'] = DIR.'Admin/~language';
            $pagePath = 'Admin/Language/EditLanguage';
            $data['result'] = $this->languages->get($id);
        }

        View::renderTemplate('header', $data,'Admin');
        View::render($pagePath,$data);
        View::renderTemplate('footer', $data,'Admin');
    }

}