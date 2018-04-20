<?php 
/**
* 
*/
class Order extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('order_model');
	}

	public function index(){
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->order_model->get_total_search_order();
        if($keywords != ''){
        	$input['where'] = array('');
            $total_rows  = $this->order_model->get_total_search_order($keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/order/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->order_model->get_all_with_pagination_search($per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->order_model->get_all_with_pagination_search($per_page, $this->data['page'], $keywords);
        }
        $this->data['keywords'] = $keywords;
        $this->data['result'] = $result;

		// print_r($result);die;
		$this->render('admin/order/list_order_view');
	}
}