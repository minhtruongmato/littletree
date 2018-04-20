<?php 
/**
* 
*/
class About_model extends MY_Model{
	public $table = 'about';

	public function get_detail(){
		$this->db->from($this->table);
		$this->db->where('is_deleted', 0);
		$this->db->limit(1);
		$this->db->order_by('id', 'DESC');
		$query = $this->db->get();
		return $query->row_array();
	}
}