<?php 
/**
* 
*/
class Banner extends Admin_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('banner_model');
		$this->load->helper('common');
		$this->author_data = handle_author_common_data();
	}

	public function index(){
        $banner = $this->banner_model->get_list();
        $this->data['banner'] = $banner;
        // print_r($banner);die;
        $this->render('admin/banner/list_banner_view');
    }

    public function create(){
        $this->load->helper('form');
        $this->load->library('form_validation');
        if($this->input->post()){
            $check_upload = true;
            if ($_FILES['image']['size'] > 1228800) {
                $check_upload = false;
            }
            if ($check_upload == true) {
                if(!empty($_FILES['image']['name'])){
                    $image = $this->upload_image('image', $_FILES['image']['name'], 'assets/upload/banner', 'assets/upload/banner/thumb');
                    $shared_request = array(
                        'image' => $image,
                        'created_at' => $this->author_data['created_at'],
                        'created_by' => $this->author_data['created_by'],
                        'updated_at' => $this->author_data['updated_at'],
                        'updated_by' => $this->author_data['updated_by']
                    );
                    $insert = $this->banner_model->create($shared_request);
                    if($insert){
                        $this->session->set_flashdata('message_success', 'Thêm mới Banner thành công!');
                        redirect('admin/banner');
                    }
                }else{
                    $this->session->set_flashdata('message_error', 'Vui lòng chọn ảnh upload!');
                    redirect('admin/banner/create');
                }
            }else{
                $this->session->set_flashdata('message_error', 'Hình ảnh vượt quá 1200 Kb. Vui lòng kiểm tra lại và thực hiện lại thao tác!');
                redirect('admin/banner');
            }
        }
        $this->render('admin/banner/create_banner_view');
    }

    public function remove(){
        $id = $this->input->post('id');
        $data = array('is_deleted' => 1);
        $update = $this->banner_model->update($id, $data);
        if($update){
            $reponse = array(
                'csrf_hash' => $this->security->get_csrf_hash()
            );
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
}