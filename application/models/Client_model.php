<?php 
/**
* 
*/
class Client_model extends MY_Model{
	
	public $table = 'client';

	public function count_total($where = array()){
		$this->db->from('client');
		if($where != null){
			$this->db->where($where);
		}
		return $result = $this->db->get()->num_rows();
	}
}