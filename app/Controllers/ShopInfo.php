<?php
namespace App\Controllers;

use Core\View;
use Core\Language as CoreLanguage;
use Core\Controller;
use Helpers\Session;
use Helpers\Cookie;
use Helpers\Url;
class ShopInfo extends Controller {

	private $shopInfos;

    public function __construct(){
        parent::__construct();
        $this->shopInfos = new \App\Models\ShopInfos();
    }	

    public function displayShowInfos(){
        if(!Session::get('username')){
            echo json_encode(array('error' => 'Không thể thực hiện được lệnh này'));
        }else{
            echo json_encode($this->shopInfos->getAll());
        }
    }

    public function create(){
        $message = null;
        $code = $_POST['code'];
        $descEn = $_POST['desc_en'];
        $descVi = $_POST['desc_vi'];
        $token = $_POST['token'];

        if($token !== Session::get('token') || $token === ''){
            $message = array('message' => 'Sai mã token');
        }else{
            $obj = array('code'=>htmlspecialchars(ucfirst(strtolower($code))),'description_en'=>htmlspecialchars($descEn),'description_vi'=>htmlspecialchars($descVi));
            if($this->shopInfos->add($obj) === true){
                $message = array('message' => 'Tạo ngôn ngữ thành công');
            }else{
                $message = array('message' => 'Tạo ngôn ngữ thất bại');
            }
        }
        echo json_encode($message);
    }

    public function delete(){
        $id = $_POST['id'];
        $token = $_POST['token'];

        if($token !== Session::get('token') || $token === ''){
            echo json_encode(false);
        }else{
            echo json_encode($this->shopInfos->delete($id));
        }

    }

    public function edit(){
        $message = null;
        $id = $_POST['id'];
        $token = $_POST['token'];
        $code = $_POST['code'];
        $descEn = $_POST['desc_en'];
        $descVi = $_POST['desc_vi'];
        $icon = $_POST['icon'];

        if($token !== Session::get('token') || $token === ''){
            $message = array('message' => 'Sai mã token');
        }else{
            $obj=array('code'=>htmlspecialchars($code),'description_en'=>htmlspecialchars($descEn),'description_vi'=>htmlspecialchars($descVi));
            $where = array('id'=>$id);
            if($this->shopInfos->update($obj,$where) === true){
                $message = array('message' => 'Tạo ngôn ngữ thành công');
            }else{
                $message = array('message' => 'Tạo ngôn ngữ  thất bại');
            }
        }
        echo json_encode($message);
    }

}