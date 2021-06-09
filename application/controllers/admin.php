<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class admin extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('about_sistem' , 'sistem');
            is_logged_in();
        }

        public function index(){


            // menampilkan buku yang terakhir di input ke Database
            $query = "SELECT `booklist` . * , `users` . `username` , `category` .`nama_kategori`
            FROM `booklist` JOIN `users`
            ON `booklist` . `uploader` = `users` . `email`
            JOIN `category`
            ON `booklist` . `cat` = `category` . `id_cat`
            ORDER BY booklist.id_book DESC LIMIT 1
            "; 
            $data['books'] =  $this->db->query($query)->row_array();

            

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Dashboard";
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('maintemplate/footer', $data);
        }


        public function role(){
            

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            
            $data['role'] = $this->db->get_where('roles')->result_array();
            
            $data['title'] = "Role Management";
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('maintemplate/footer', $data);
            
            }

        public function role_acc($id){

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Access Settings";

            $data['role'] = $this->db->get_where('roles' , ['id_role' => $id])->row_array();
              
            $this->db->where('id !=', 1);
            $data['menu'] = $this->db->get('menu')->result_array();
            $data['title'] = "Edit Access";
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('admin/role_access', $data);
            $this->load->view('maintemplate/footer', $data);
        }


        //Bagian dari Ajax untuk merubah akses
        public function changeaccess(){
            $menu_id = $this->input->post('menuId');
            $role_id = $this->input->post('roleId');

            $data = [
                'role_id' => $role_id,
                'menu_id' => $menu_id
            ];

            $result = $this->db->get_where('access', $data);

            if($result->num_rows() < 1 ){
                $this->db->insert('access', $data);
            }else{
                $this->db->delete('access', $data);
            }

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Access Changed
          </div>');


        }


        public function about(){
            $data['user'] = $this->db->get_where('users' , ['email' => $this->session->userdata('email')])->row_array();
            $data['about'] = $this->db->get('about')->row_array();

            $data['title'] = 'Update to About Menu';

            $this->form_validation->set_rules('about' , 'About', 'required');
            if($this->form_validation->run() == false){
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('admin/update', $data);
            $this->load->view('maintemplate/footer', $data);
            }else{
			    $this->sistem->update();
            }
        }
    
    }

?>