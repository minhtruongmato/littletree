<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends Public_Controller{
	
	private $_lang = '';

	function __construct(){
		parent::__construct();
		$this->load->model('client_model');
	}

	public function register(){
		$this->load->helper('form');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'Họ tên', 'required', array('required' => '%s không được trống!'));
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|callback_check_email', array('required' => '%s không được trống!', 'valid_email' => 'Định dạng Email khồng đúng'));
        $this->form_validation->set_rules('password', 'Mật khẩu', 'required|min_length[6]', array('required' => '%s không được trống!', 'min_length' => '%s phải nhiều hơn 6 ký tự'));
        $this->form_validation->set_rules('confirm-password', 'Xác nhận mật khẩu', 'required|matches[password]', array('required' => '%s không được trống!', 'matches' => '%s không đúng!'));

        if ($this->form_validation->run() == FALSE) {
        	$this->load->view('client_view');
        } else {
        	if($this->input->post()){
        		$data = array(
        			'name' => $this->input->post('username'),
        			'email' => $this->input->post('email'),
        			'phone' => $this->input->post('phone'),
        			'address' => $this->input->post('address'),
        			'district' => $this->input->post('district'),
        			'city' => $this->input->post('city'),
        			'password' => md5($this->input->post('password')),
        			'created_at' => date('Y-m-d H:i:s')
        		);
        		$insert = $this->client_model->create($data);
        		if($insert){
        			$this->session->set_flashdata('message_success', 'Đăng ký tài khoản thành công!');
        			redirect('register');
        		}else{
        			$this->session->set_flashdata('message_error', 'Đăng ký tài khoản thất bại!');
        			redirect('register');
        		}
        	}
        }
	}

	public function login(){
		if($this->session->userdata('client_login')){
			redirect('homepage');
		}
		$this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('login_email', 'Email', 'required|valid_email', array('required' => '%s không được trống!', 'valid_email' => 'Định dạng Email khồng đúng'));
        $this->form_validation->set_rules('login_password', 'Mật khẩu', 'required|min_length[6]', array('required' => '%s không được trống!', 'min_length' => '%s phải nhiều hơn 6 ký tự'));

        if ($this->form_validation->run() == FALSE) {
        	$this->load->view('client_view');
        } else {
        	if($this->input->post()){
        		$email = $this->input->post('login_email');
        		$password = md5($this->input->post('login_password'));

        		$where = array('email' => $email, 'password' => $password);
				$login = $this->client_model->count_total($where);
        		if($login > 0){
        			$this->session->set_userdata('client_login', $email);
        			redirect('homepage');
        		}else{
        			$this->session->set_flashdata('message_error', 'Đăng nhập thất bại. Email hoặc mật khẩu không đúng!');
        			redirect('client/login');
        		}
        	}
        }
	}


	public function check_email(){
		$email = $this->input->post('email');
		$where = array('email' => $email);
		$total = $this->client_model->count_total($where);
		if($total > 0){
			$this->form_validation->set_message(__FUNCTION__, 'Email đã tồn tại. Vui lòng kiểm tra lại!');
			return FALSE;
		}
		return TRUE;
	}
}