<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class About extends CI_Controller {

        //Membuat Method Construct yang berfungsi meload sebuah model.
        public function __construct(){
            parent::__construct();
            $this->load->model('login_sistem' , 'login');		
        }
        
        
        public function index(){

            $data['about'] = $this->db->get('about')->row_array();




            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'About this Site';
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('about/about', $data);
            $this->load->view('maintemplate/footer', $data);

        }

        public function thanks(){
            
            
            $data['thanks'] = $this->db->get('thanks')->result_array();
            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = 'thanks to..';
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('about/thanks', $data);
            $this->load->view('maintemplate/footer', $data);
        }
    }
?>