<?php 
/**
* 
*/
class Order_product_model extends MY_Model{
	
	public $table = 'order_product';

	public function get_all($where = array()) {
        $this->db->select('order_product.*');
        $this->db->from('order_product');
        if($where != null){
        	$this->db->where($where);
        }
        $this->db->order_by("id", "desc");

        return $result = $this->db->get()->result_array();
    }
}