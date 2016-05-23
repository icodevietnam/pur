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
		return $this->db->select("SELECT id,username,fullname,email,active FROM ".PREFIX.$this->tableName." ");
	}

	public function getUserWithoutPassword($id){
		return $this->db->select("SELECT id,username,fullname,email,active FROM ".PREFIX.$this->tableName." WHERE id = :id ",array('id' => $id));
	}

}