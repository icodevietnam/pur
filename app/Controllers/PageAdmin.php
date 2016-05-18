<?php
namespace App\Controllers;
use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
class PageAdmin extends Controller {	

	public function __construct()
    {
        parent::__construct();
        if(Session::get('username') === null){
            Url::redirect('admin/login');
        }
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
        View::renderTemplate('header', $data,'admin');
        View::render('Admin/User', $data);
        View::renderTemplate('footer', $data,'admin');
    }

}