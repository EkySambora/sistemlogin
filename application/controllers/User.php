<?php 

class User extends CI_Controller{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}
	public function index()
	{
		$data['title'] = 'Member Area';
		if(!$this->session->userdata('is_login')) redirect('user/login');
		$this->load->view('user/member', $data);
	}
	public function login()
	{
		$data['title'] = 'Log In';
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if($this->form_validation->run() == false){
			$this->load->view('user/login', $data);
		}else{
			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$user = $this->user_model->get_by_email_password($email, $password);
			if(!empty($user)){
				$data = array(
					'user_id' => $user->id,
					'user_name' => $user->nama,
					'user_email' => $user->email,
					'is_login' => true
				);
				$this->session->set_userdata($data);
				redirect('user');
			}else{
				$this->session->set_flashdata('error_login', 'Your account Wrong');
				redirect('user/login');
			}
		}
		
	}
	public function register()
	{
		$data['title'] = 'Register User';
		//panggil create_captcha
		$cap = $this->user_model->create_captcha();
		//passing gambar ke view
		$data['captcha'] = $cap['image'];
		//pertama
		$this->form_validation->set_rules('fullname', 'Fullname', 'required|is_unique[user.fullname]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|is_unique[user.nama]');
		$this->form_validation->set_rules('email', 'Email','required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('captcha_code', 'Captcha_code', 'required|callback_checkcaptcha');//captcha
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
		$this->form_validation->set_rules('retypepassword', 'retypepassword', 'required|min_length[5]|matches[password]');
		if($this->form_validation->run() == false){
			$this->load->view('user/register', $data);
		}else{
			$data = array(
				'fullname' => $this->input->post('fullname'),
				'nama' => $this->input->post('nama'),
				'email' => $this->input->post('email'),
				'password' => sha1($this->input->post('password'))
			);
			$this->user_model->insert_user($data);
			$this->session->set_flashdata('success', '<b>Berhasil Register!</b> <a href=" '. site_url('user/login') .' ">Login &raquo;</a>');
			redirect('user/register');
		}
			$this->session->set_userdata('captcha_word', $cap['word']);
	}

	public function logout()
	{
		$data = array(
			'user_id', 'user_name', 'user_email', 'is_login'
		);
		$this->session->unset_userdata($data);
		redirect('user/login');
	}
	public function checkcaptcha()
	{	
		$captcha = $this->input->post('captcha_code');
		if($captcha != $this->session->userdata('captcha_word')){
			$this->form_validation->set_message('checkcaptcha', 'The captcha code is wrong' );
			return FALSE;
		}else{
			return TRUE;
		}
	}
}