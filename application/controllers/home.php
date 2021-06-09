<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class home extends CI_Controller {

	//Membuat Method Construct yang berfungsi meload sebuah model.
	public function __construct(){
		parent::__construct();
		$this->load->model('login_sistem' , 'login');		
	}

	//Method utama dari Controller home yang mengarah ke halaman Login
	public function index(){
		//melakukan pengecekan apakah User telah masuk sebelumnya.
		if($this->session->userdata('email')){
			redirect('data');
		}

		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email');
		$this->form_validation->set_rules('password' , 'Password', 'required|min_length[3]');

		if($this->form_validation->run() == false){
			$data['title'] = "Private book List-Login";
			$this->load->view('htemplate/header', $data);
			$this->load->view('home/login');
			$this->load->view('htemplate/footer');
		}else{
			
			$this->login->login();
		}
	}


	public function register(){
		if($this->session->userdata('email')){
			redirect('data');
		}

		$this->form_validation->set_rules('username','username','required|trim');
		$this->form_validation->set_rules('email','Email', 'required|trim|valid_email|is_unique[users.email]',[ 'is_unique' => 'Email has been Registered before']);
		$this->form_validation->set_rules('Password1' , 'Password', 'required|matches[password2]|min_length[3]');
		$this->form_validation->set_rules('password2' , 'Repeat Password', 'required|matches[Password1]');

		if($this->form_validation->run() == false){
			$data['title'] = "Private book List-Register";
			$this->load->view('htemplate/header', $data);
			$this->load->view('home/regis');
			$this->load->view('htemplate/footer');
		}else{
			$this->login->register();
		}
	}


	public function logout(){
		$this->session->unset_userdata('email');
            $this->session->unset_userdata('role');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                You Already Log out
              </div>');
            redirect('home');
	}

	//Jika User memaksa masuk ke Halaman Admin dengan mengakses via URL
	public function blocked(){
		$data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
		$data['title'] = "BLOCKED";
		$this->load->view('maintemplate/header', $data);
		$this->load->view('maintemplate/sidebar', $data);
		$this->load->view('maintemplate/topbar', $data);
		$this->load->view('home/blocked');
		$this->load->view('maintemplate/footer');
	}
}
