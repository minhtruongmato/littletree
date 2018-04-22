<?php 
/**
* 
*/
class Order extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('order_model');
        $this->load->model('order_product_model');
        $this->load->model('product_model');
	}

	public function index(){
        $this->template();
	}

    public function ongoing(){
        $this->template('ongoing', 1);
    }

    public function complete(){
        $this->template('complete', 2);
    }

    public function cancel(){
        $this->template('cancel', 99);
    }

    public function detail($id){
        $detail = $this->order_model->get_by_id($id);
        $where = array('order_id' => $detail['id']);
        $order_product = $this->order_product_model->get_all($where);
        $detail['order_product'] = $order_product;
        foreach ($order_product as $k => $val) {
            // $input['where'] = array('id' => $value['product_id']);
            $product = $this->product_model->get_info($val['product_id']);
            $detail['order_product'][$k]['price_min'] = $product['price_min'];
            $detail['order_product'][$k]['price_mid'] = $product['price_mid'];
            $detail['order_product'][$k]['price_max'] = $product['price_max'];
            $detail['order_product'][$k]['product_image'] = $product['image'];
            $detail['order_product'][$k]['slug'] = $product['slug'];
        }
        $this->data['detail'] = $detail;
        // print_r($detail);die;
        $this->render('admin/order/detail_order_view');
    }

    public function change_cancel(){
        $id = $this->input->post('id');
        $this->template_status($id, 99);
    }

    public function change_ongoing(){
        $id = $this->input->post('id');
        $this->template_status($id, 1);
    }

    public function change_complete(){
        $id = $this->input->post('id');
        $this->template_status($id, 2);
    }

    protected function template_status($id, $status){

        $detail = $this->order_model->get_by_id($id);
        if(!$detail){
            $success = false;
        }
        $data = array('status' => $status);
        $update = $this->order_model->update($id, $data);
        if($update){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200, 'reponse' => $reponse, 'isExists' => false)));
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode(array('status' => 404)));
    }

    protected function template($temp = 'index', $status = 0){
        $keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->order_model->get_total_search_order($status);
        if($keywords != ''){
            $input['where'] = array('');
            $total_rows  = $this->order_model->get_total_search_order($status, $keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/order/'. $temp);
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->order_model->get_all_with_pagination_search($status, $per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->order_model->get_all_with_pagination_search($status, $per_page, $this->data['page'], $keywords);
        }

        

        $this->data['keywords'] = $keywords;
        $this->data['result'] = $result;
        $this->data['temp'] = $temp;

        
        $this->render('admin/order/list_order_view');
    }
}