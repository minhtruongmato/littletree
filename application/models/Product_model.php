<?php 
/**
* 
*/
class Product_model extends MY_Model{
	
	public $table = 'product';

    public function get_all_with_pagination_search($limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select($this->table .'.*, category.title as cate_title');
        $this->db->from($this->table);
        $this->db->join('category', $this->table .'.category_id = category.id');
        $this->db->like($this->table .'.title', $keywords);
        $this->db->where($this->table .'.is_deleted', 0);
        $this->db->where('category.is_deleted', 0);
        $this->db->limit($limit, $start);
        $this->db->order_by($this->table .".id", "desc");

        return $result = $this->db->get()->result_array();
    }

    public function get_by_id($id){
        $this->db->select($this->table .'.*, category.title as cate_title');
        $this->db->from($this->table);
        $this->db->join('category', $this->table .'.category_id = category.id');
        $this->db->where(array($this->table .'.is_deleted' => 0, 'category.is_deleted' => 0, $this->table .'.id' => $id));
        return $result = $this->db->get()->row_array();
    }
}