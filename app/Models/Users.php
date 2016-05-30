<?php
namespace app\Models;

use \App\Models\Commons;

class Users extends Commons
{
	private $tableName; 
	function __construct()
	{
		$this->tableName = 'users';
		parent::__construct($this->tableName);
	}


	public function getMemberHash($username){
		return $this->db->select("SELECT id,username,password,fullname FROM ".PREFIX.$this->tableName." WHERE active=1 AND username = :username ",array(':username' => $username));
	}

	public function getAllUsers(){
		return $this->db->select("SELECT id,username,fullname,email,active FROM ".PREFIX.$this->tableName." ORDER BY ID DESC ");
	}

	public function getUserWithoutPassword($id){
		return $this->db->select("SELECT id,username,fullname,email,active FROM ".PREFIX.$this->tableName." WHERE id = :id ",array('id' => $id));
	}

	public function checkUsername($username){
		$data = null;
		try {
			$data = $this->db->select("SELECT * FROM ".PREFIX."users WHERE username =:username",array(':username' => $username));
			if(count($data) >= 1){
				return false;
			}else{
				return true;
			}
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return true;
		}
	}

	public function checkEmail($email,$oldEmail){
		$data = null;
		$para = null;
		try {
			$query = "SELECT * FROM ".PREFIX."users WHERE email =:email";
			$para = array(':email' => $email);
			if(null != $oldEmail || ''=== $oldEmail){
				$query.= $query.(" AND email <> :oldEmail");
				$para = array(':email' => $email,':oldEmail' => $oldEmail);
			}
			$data = $this->db->select($query,$para);
			if(count($data) >= 1){
				return false;
			}else{
				return true;
			}
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return true;
		}
	}

}