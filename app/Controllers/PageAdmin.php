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

}