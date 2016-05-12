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
    //Home index
    public function dashboard(){
    	$data['title'] = 'Home';
    	View::renderTemplate('header', $data,'admin');
        View::render('Home/Home', $data);
        View::renderTemplate('footer', $data,'admin');
    }
}