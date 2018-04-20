<?php 
/**
* 
*/
class Category extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('category_model');
	}

	public function index()
	{
		$this->load->library('pagination');
		$config = array();
		$total_rows = $this->category_model->get_total();
		$base_url = base_url('admin/category/index');
		$per_page = 10;
		$uri_segment = 4;
		foreach ($this->pagination_config($base_url, $total_rows, $per_page, $uri_segment) as $key => $value) {
            $config[$key] = $value;
        }
        $this->pagination->initialize($config);

        $this->data['page_links'] = $this->pagination->create_links();
        $this->data['page'] = ($this->uri->segment(4)) ? $this->uri->segment(4) : 0;

        $input['limit'] = array($per_page ,$this->data['page']);
		$input['order'] = array('id','ASC');
		$category = $this->category_model->get_list($input);
		foreach ($category as $key => $value) {
			$input = array();
			$input['where'] = array('id' => $value['parent_id']);
			if($value['parent_id'] !=0){
				$sub = $this->category_model->get_list($input);
				$category[$key]['sub'] = $sub[0]['title'];
			}
		}
		$this->data['result'] = $category;
		// print_r($category);die;
		$this->render('admin/category/list_category_view');
	}

	public function create(){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$input['order'] = array('id', 'asc');
		$category = $this->category_model->get_list($input);

		$new_category = $this->build_array_for_dropdown($category);
		$this->data['category'] = $new_category;

		$this->form_validation->set_rules('category_title', 'Tên danh mục', 'required');
		if($this->input->post()){
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'title' => $this->input->post('category_title'),
					'slug' => $this->input->post('category_slug'),
					'parent_id' => $this->input->post('parent_id'),
					'created_at' => $this->author_data['created_at'],
                    'created_by' => $this->author_data['created_by'],
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
				);
				$create = $this->category_model->create($data);
				if($create){
					$this->session->set_flashdata('message_success', 'Thêm mới danh mục thành công');
					redirect('admin/category','refresh');
				}else{
					$this->session->set_flashdata('message_error', 'Thêm mới danh mục thất bại');
				}
			}
		}

		$this->render('admin/category/create_category_view');
	}

	public function edit($id){
		$this->load->library('form_validation');
		$this->load->helper('form');
		$input['order'] = array('id', 'asc');
		$category_list = $this->category_model->get_list($input);

		$new_category = $this->build_array_for_dropdown($category_list);
		unset($new_category[$id]);
		$this->data['category_list'] = $new_category;


		$category_detail = $this->category_model->get_info($id);
		$this->data['category_detail'] = $category_detail;

		$this->form_validation->set_rules('category_title', 'Tên danh mục', 'required');
		if($this->input->post()){
			if ($this->form_validation->run() == TRUE) {
				$data = array(
					'title' => $this->input->post('category_title'),
					'slug' => $this->input->post('category_slug'),
					'parent_id' => $this->input->post('parent_id'),
                    'updated_at' => $this->author_data['updated_at'],
                    'updated_by' => $this->author_data['updated_by']
				);
				$update = $this->category_model->update($id, $data);
				if($update){
					$this->session->set_flashdata('message_success', 'Cập nhật danh mục thành công');
					redirect('admin/category','refresh');
				}else{
					$this->session->set_flashdata('message_error', 'Cập nhật danh mục thất bại');
				}
			}
		}


		$this->render('admin/category/edit_category_view');
	}

	public function remove(){

		$id = $this->input->post('id');
        $data = array('is_deleted' => 1);
        $update = $this->category_model->update($id, $data);
        if($update){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
            $input['where'] = array('parent_id' => $id);
			$check = $this->category_model->get_total($input);
			if($check > 0){
				$where = array('parent_id' => $id);
				$this->category_model->update_rule($where, $data);
			}
            return $this->output
                ->set_content_type('application/json')
                ->set_status_header(200)
                ->set_output(json_encode(array('status' => 200, 'reponse' => $reponse, 'isExists' => true)));
        }
        return $this->output
            ->set_content_type('application/json')
            ->set_status_header(404)
            ->set_output(json_encode(array('status' => 404)));
	}

	protected function build_array_for_dropdown($data = array()){
		$new_data = array(0 => 'Danh mục gốc');
		foreach ($data as $key => $value) {
			$new_data[$value['id']] = $value['title'];
		}
		return $new_data;
	}
}