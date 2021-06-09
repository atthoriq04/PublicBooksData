<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class User extends CI_Controller {

        public function __construct(){
            parent::__construct();
            is_logged_in();
            $this->load->model('user_sistem', 'user');
        }

        public function index(){

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $email = $this->session->userdata('email');

            //query untuk menampilkan buku yang pernah diupdate oleh User
            $query = "SELECT `booklist` . * , `category` .`nama_kategori`
                    FROM `booklist` JOIN `category`
                    ON `booklist` . `cat` = `category` . `id_cat`
                    WHERE booklist.uploader = '$email'
            ";   
            
            $data['ada'] =  $this->db->query($query);
            $data['rows'] = $data['ada']->num_rows(); //mencari keseluruhan buku yang user update
            $data['books'] = $data['ada']->result_array();

          
            $role = $this->session->userdata('role');
            $namarole = " SELECT * FROM users  INNER JOIN `roles` ON `id_role` = $role ";
            $data['role'] = $this->db->query($namarole)->row_array();



            $data['title'] = "My Profile";
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('maintemplate/footer', $data);
        }

        public function edit(){
            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
    

            $this->form_validation->set_rules('name','Name','required|trim');



            if($this->form_validation->run() == false) {
            $data['title'] = "Edit Profile";
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('maintemplate/footer', $data);
            }else{
                $this->user->edit($data);

                
            }
        }

        public function change(){
            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Change Password";

            $this->form_validation->set_rules('currentpassword','Current Password','required|trim');
            $this->form_validation->set_rules('password1','New Password','required|trim|min_length[3]|matches[password2]');
            $this->form_validation->set_rules('password2','Confirm New Password','required|trim|min_length[3]|matches[password1]');


            if($this->form_validation->run() == false) {
                
                $this->load->view('maintemplate/header', $data);
                $this->load->view('maintemplate/sidebar', $data);
                $this->load->view('maintemplate/topbar', $data);
                $this->load->view('user/change', $data);
                $this->load->view('maintemplate/footer');
            }else{
                $this->user->change($data);
            }
        }

        public function detail($code){
                $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

                $data['detil'] = $this->db->get_where('users', ['id' => $code])->row_array();
                $data['role']= $this->db->get_where('roles' , ['id_role' => $data['detil']['role_id']] )->row_array();

                if($data['detil']['id'] == $data['user']['id']){
                    redirect('user');
                }else{
                    $email = $data['detil']['email'];
                    $query = "SELECT `booklist` . * , `category` .`nama_kategori`
                    FROM `booklist` JOIN `category`
                    ON `booklist` . `cat` = `category` . `id_cat`
                    WHERE booklist.uploader = '$email'
                    ";   
                    
                    $data['ada'] =  $this->db->query($query);
                    $data['rows'] = $data['ada']->num_rows();
                    $data['books'] = $data['ada']->result_array();

                $data['title'] = "User Profile";
                $this->load->view('maintemplate/header', $data);
                $this->load->view('maintemplate/sidebar', $data);
                $this->load->view('maintemplate/topbar', $data);
                $this->load->view('user/detil', $data);
                $this->load->view('maintemplate/footer', $data);
                 }
        }



    
    }

?>