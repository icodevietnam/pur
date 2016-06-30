<?php
namespace App\Controllers;
use Core\View;
use Core\Controller;
use Helpers\Session;
use Helpers\Url;
use Helpers\Password;
use Helpers\Csrf;


class ShopInfo extends Controller{

	private $shopinfos;

	public function __construct(){
		parent::__construct();
		$this->shopinfos = new \App\Models\ShopInfos();
	}

	function countShopInfo(){
		$token = $_GET['token'];
		if($token !== Session::get('token') || $token === ''){
			echo json_encode(array('error' => 'Không thể thực hiện được lệnh này'));
		}else{
			echo json_encode($this->shopinfos->countRow());
		}
	}
	
}