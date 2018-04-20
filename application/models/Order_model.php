<?php 
/**
* 
*/
class Order_model extends MY_Model{
	
	public $table = 'order';

	public function get_all_with_pagination_search($limit = NULL, $start = NULL, $keywords = '') {
        $this->db->select('');
        $this->db->from('order_product');
        $this->db->join('order', 'order.id = order_product.order_id');
        $this->db->join('product', 'order_product.product_id = product.id');
        $this->db->like('order.unique_code', $keywords);
        $this->db->limit($limit, $start);
        $this->db->order_by("order.id", "desc");

        return $result = $this->db->get()->result_array();
    }

    function get_total_search_order($keyword = ''){
        $this->db->select('*');
        $this->db->from($this->table);
        if($keyword != ''){
        	$this->db->like('unique_code', $keyword);
        }
        return $result = $this->db->get()->num_rows();
    }
}