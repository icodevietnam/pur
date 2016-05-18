<?php
namespace App\Controllers;

use Core\View;
use Core\Language as CoreLanguage;
use Core\Controller;
use Helpers\Session;
use Helpers\Cookie;
use Helpers\Url;
class Language extends Controller {	

	public function __construct()
    {
        parent::__construct();
    }
    
    //Change Language
    public function change($language){
    	if (preg_match ('/[a-z]/', $language) && in_array($language, CoreLanguage::$codes)) {
            Session::set('language', ucfirst($language));
            // Store the current Language into Cookie.
            Cookie::set(PREFIX .'language', $language);
        }
        Url::redirect();
    }

    
}