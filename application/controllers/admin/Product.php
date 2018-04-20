<?php 
/**
* 
*/
class Product extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('product_model');
		$this->load->model('category_model');
	}

	public function index(){
		$keywords = '';
        if($this->input->get('search')){
            $keywords = $this->input->get('search');
        }
        $total_rows  = $this->product_model->get_total();
        if($keywords != ''){
        	$input['where'] = array('');
            $total_rows  = $this->product_model->get_total_search($keywords);
        }

        $this->load->library('pagination');
        $config = array();
        $base_url = base_url('admin/product/index');
        $per_page = 10;
        $uri_segment = 4;
        foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $result = $this->product_model->get_all_with_pagination_search($per_page, $this->data['page']);
        if($keywords != ''){
            $result = $this->product_model->get_all_with_pagination_search($per_page, $this->data['page'], $keywords);
        }
        $this->data['keywords'] = $keywords;
        $this->data['result'] = $result;
        // print_r($result);die;

    	$this->render('admin/product/list_product_view');
	}

	public function create(){
		$this->load->helper('form');
        $this->load->library('form_validation');
        $input['order'] = array('id', 'asc');
        $input['where'] = array('parent_id' => 0);
		$category = $this->category_model->get_list($input);

		foreach ($category as $key => $value) {
			// $input = array();
			$input['where'] = array('parent_id' => $value['id']);
			$category[$key]['sub'] = $this->category_model->get_list($input);
		}
		$this->data['category'] = $category;

		$this->form_validation->set_rules('title', 'Tên sản phẩm', 'required');
		$this->form_validation->set_rules('category_id', 'Tên danh mục', 'required');
		$this->form_validation->set_rules('price_min', 'Giá cho sản phẩm nhỏ', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->render('admin/product/create_product_view');
		} else {
			if ($this->input->post()) {
				$slug = $this->input->post('slug');
            	$unique_slug = $this->category_model->build_unique_slug($slug);
            	if(!file_exists("assets/upload/product/".$unique_slug)){
                    mkdir("assets/upload/product/".$unique_slug, 0755);
                    mkdir("assets/upload/product/".$unique_slug.'/thumb', 0755);
                }

				$check_upload = true;
	            if ($_FILES['image']['size'] > 1228800) {
	                $check_upload = false;
	            }
	            if ($check_upload == true) {
	                if(!empty($_FILES['image']['name'])){
	                    $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/product/'.$unique_slug, 'assets/upload/product/'. $unique_slug .'/thumb');
	                    $data = array(
	                        'image' => $image,
	                        'title' => $this->input->post('title'),
	                        'slug' => $unique_slug,
	                        'category_id' => $this->input->post('category_id'),
	                        'price_min' => $this->input->post('price_min'),
	                        'price_mid' => $this->input->post('price_mid'),
	                        'price_max' => $this->input->post('price_max'),
	                        'description' => $this->input->post('description'),
	                        'content' => $this->input->post('content'),
	                        'created_at' => $this->author_data['created_at'],
	                        'created_by' => $this->author_data['created_by'],
	                        'updated_at' => $this->author_data['updated_at'],
	                        'updated_by' => $this->author_data['updated_by']
	                    );
	                    $insert = $this->product_model->create($data);
	                    if($insert){
	                        $this->session->set_flashdata('message_success', 'Thêm mới sản phẩm thành công!');
	                        redirect('admin/product');
	                    }
	                }else{
	                    $this->session->set_flashdata('message_error', 'Vui lòng chọn ảnh upload!');
	                    redirect('admin/product/create');
	                }
	            }else{
	                $this->session->set_flashdata('message_error', 'Hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
	                redirect('admin/product');
	            }
			}
		}
	}

	public function edit($id=''){
		$this->load->helper('form');
        $this->load->library('form_validation');

		$detail = $this->product_model->get_info($id);
		if(!$detail){
			redirect('admin/product');
		}
		$this->data['detail'] = $detail;

        $input['order'] = array('id', 'asc');
        $input['where'] = array('parent_id' => 0);
		$category = $this->category_model->get_list($input);

		foreach ($category as $key => $value) {
			// $input = array();
			$input['where'] = array('parent_id' => $value['id']);
			$category[$key]['sub'] = $this->category_model->get_list($input);
		}
		$this->data['category'] = $category;

		$this->form_validation->set_rules('title', 'Tên sản phẩm', 'required');
		$this->form_validation->set_rules('category_id', 'Tên danh mục', 'required');
		$this->form_validation->set_rules('price_min', 'Giá cho sản phẩm nhỏ', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->render('admin/product/edit_product_view');
		} else {
			if($this->input->post()){
				$slug = $this->input->post('slug');
            	$unique_slug = $this->category_model->build_unique_slug($slug);
            	if(file_exists("assets/upload/product/".$detail['slug'])){
                    rename("assets/upload/product/".$detail['slug'], "assets/upload/product/".$unique_slug);
                }
            	if(!file_exists("assets/upload/product/".$unique_slug)){
                    mkdir("assets/upload/product/".$unique_slug, 0755);
                    mkdir("assets/upload/product/".$unique_slug.'/thumb', 0755);
                }
                $check_upload = true;
	            if ($_FILES['image']['size'] > 1228800) {
	                $check_upload = false;
	            }
	            if($check_upload = true){
	            	$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/product/'.$unique_slug, 'assets/upload/product/'. $unique_slug .'/thumb');

	            	$data = array(
                        'title' => $this->input->post('title'),
                        'slug' => $unique_slug,
                        'category_id' => $this->input->post('category_id'),
                        'price_min' => $this->input->post('price_min'),
                        'price_mid' => $this->input->post('price_mid'),
                        'price_max' => $this->input->post('price_max'),
                        'description' => $this->input->post('description'),
                        'content' => $this->input->post('content'),
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );

                    if($image){
                    	$data['image'] = $image;
                    }

                    $update = $this->product_model->update($id, $data);
                    if($update){
                        $this->session->set_flashdata('message_success', 'Cập nhật sản phẩm thành công!');
                        redirect('admin/product');
                    }
	            }else{
	            	$this->session->set_flashdata('message_error', 'Hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
	                redirect('admin/product');
	            }
			}
		}
	}

	public function detail($id=''){
		$detail = $this->product_model->get_by_id($id);
		if(!$detail){
			redirect('admin/product');
		}
		$this->data['detail'] = $detail;
		// print_r($detail);die;

		$this->render('admin/product/detail_product_view');
	}

	public function remove(){
        $id = $this->input->post('id');
        $data = array('is_deleted' => 1);
        $update = $this->product_model->update($id, $data);
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
}