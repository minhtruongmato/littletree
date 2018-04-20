<?php 

/**
*
* 
*/
class About extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('about_model');
		$this->load->helper('common');
		$this->author_data = handle_author_common_data();
	}

	public function index(){
		$detail = $this->about_model->get_detail();
		$this->data['detail'] = $detail;
		$this->render('admin/about/detail_about_view');
	}

	public function edit($id = null){
		$this->load->helper('form');
        $this->load->library('form_validation');

		$detail = $this->about_model->get_info($id);
		// if(!$detail){
		// 	redirect('admin/about');
		// }
		$this->data['detail'] = $detail;
		$this->form_validation->set_rules('title', 'Tiêu đề', 'required');

		if ($this->form_validation->run() == TRUE){
			if ($this->input->post()) {
				$check_upload = true;
                if( $_FILES['image']['size'] > 1228800){
                    $check_upload = false;
                }
                if($check_upload == true){
                	$image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/about', 'assets/upload/about/thumb', 500, 500);
					$data = array(
						'title' => $this->input->post('title'),
						'slug' => $this->input->post('slug'),
						'content' => $this->input->post('content'),
						'created_at' => $this->author_data['created_at'],
	                    'created_by' => $this->author_data['created_by'],
	                    'updated_at' => $this->author_data['updated_at'],
	                    'updated_by' => $this->author_data['updated_by']
					);
					if($image){
						$data['image'] = $image;
					}
					$update = $this->about_model->update($id, $data);
					// echo $update;die;
					if(!$update){
						$this->session->set_flashdata('message_error', 'Cập nhật thất bại!');
                        redirect('admin/about/edit/'. $id);
					}else{
						if($detail['image'] != $image && file_exists('assets/upload/about/'.$image)){
							unlink('assets/upload/about/'.$detail['image']);
						}
						$this->session->set_flashdata('message_success', 'Cập nhật thành công!');
                        redirect('admin/about');
					}

                }else{
                	$this->session->set_flashdata('message_error', 'Có hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                    redirect('admin/about');
                }
				
			}
		}
		$this->render('admin/about/edit_about_view');
		
	}
}