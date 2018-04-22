<?php 
/**
* 
*/
class Order_model extends MY_Model{
	
	public $table = 'order';

	public function get_all_with_pagination_search($status = 0, $limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select('order.*');
        $this->db->from('order');
        $this->db->like('unique_code', $keywords);
        $this->db->where('status', $status);
        $this->db->limit($limit, $start);
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }

    function get_total_search_order($status = 0, $keyword = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        $this->db->where('status', $status);
        if($keyword != ''){
        	$this->db->like('unique_code', $keyword);
        }
        return $result = $this->db->get()->num_rows();
    }

    function get_by_id($id){
        $this->db->select('order.*');
        $this->db->from('order');
        $this->db->where('id', $id);
        return $result = $this->db->get()->row_array();
    }
}