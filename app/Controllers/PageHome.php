<?php
namespace App\Controllers;
use Core\View;
use Core\Controller;
use Core\Language;
use Helpers\Session;
use Helpers\Url;
class PageHome extends Controller {	

    private $languages;

	public function __construct()
    {
        parent::__construct();
        $this->languages = new \App\Models\Languages();
    }
    //Home index
    public function index(){
    	$data['title'] = Language::show('home', 'General');
        $data['languages'] = $this->languages->getAll();
    	View::renderTemplate('header', $data);
        View::render('Home/Home', $data);
        View::renderTemplate('footer', $data);
    }
}