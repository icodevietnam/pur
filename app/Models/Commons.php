<?php
namespace app\Models;

use Core\Model;

class Commons extends Model{

	private $tableName;

	function __construct($table){
		parent::__construct();
		$this->tableName = $table;
	}

	function getAll($order='desc'){
		$data = null;
		try {
			$query = "SELECT * FROM ".PREFIX.$this->tableName." order by id ".$order;
			$data = $this->db->select($query);
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $data;
	}

	function add($data){
		try {
			$this->db->insert(PREFIX.$this->tableName,$data);
			return true;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return false;
		}
	}

	function delete($id){
		try {
			$this->db->delete(PREFIX.$this->tableName,array('id' => $id));
			return true;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return false;
		}
	}

	function get($id){
		$data = null;
		try {
			$data = $this->db->select("SELECT * FROM ".PREFIX.$this->tableName." WHERE id =:id",array(':id' => $id));
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
		}
		return $data;
	}

	function update($data,$where){
		try {
			$this->db->update(PREFIX.$this->tableName,$data,$where);
			return true;
		} catch (Exception $e) {
			echo 'Caught exception: ',  $e->getMessage(), "\n";
			return false;
		}
	}

}