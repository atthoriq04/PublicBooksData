<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class data extends CI_Controller {

        public function __construct(){
            parent::__construct();
            $this->load->model('data_sistem' , 'data');            
            $this->load->model('category_sistem' , 'category');            
            is_logged_in();
        }

        public function refresh(){
            $this->session->unset_userdata('cari');
            redirect('data');
        } 
        
        
        public function index(){


            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            
            
            if( $this->session->userdata('cari')){
                $data['cari'] =  $this->session->userdata('cari');
            }else{
            $data['cari'] = null;
            }

            if($this->input->post('search')){
                $data['cari'] = $this->input->post('search');
                $this->session->set_userdata('cari', $data['cari']);
             }
             

            $this->load->library('pagination');

            $this->db->like('title' , $data['cari']);
            $this->db->or_like('nama_kategori' , $data['cari']);
            $this->db->or_like('username' , $data['cari']);
            $this->db->from('booklist');
            $this->db->join('users' , 'booklist.uploader = users.email');
            $this->db->join('category' , 'booklist.cat = category.id_cat');
            $config['base_url'] = 'http://localhost/privooksata/data/index/';
            $config['total_rows'] = $this->db->count_all_results();
            $config['per_page'] = 9;
            $config['num_links'] = 4;            
           
            $this->pagination->initialize($config);


            $data['start'] = $this->uri->segment(3);
            
            
           
           
          
            
            $books = $this->data->get($config['per_page'], $data['start'], $data['cari']); 
            
            
            $data['books'] =  $books;


            $data['title'] = "Book List";
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('data/booklist', $data);
            $this->load->view('maintemplate/footer', $data);
        }



        public function detail($id){
            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('id')])->row_array();

            $data['id'] = $id;

            $query = "SELECT * FROM booklist 
            INNER JOIN category ON booklist.cat = category.id_cat
            INNER JOIN users ON booklist.uploader = users.email
            WHERE booklist.id_book = $id
            "; 
            $data['books'] =  $this->db->query($query)->row_array();
            $data['category'] = $this->db->get('category')->result_array();


            $this->form_validation->set_rules('title', 'Title', 'required|trim');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('writer', 'writer', 'required|trim');
            $this->form_validation->set_rules('publisher', 'publisher', 'required|trim');
            $this->form_validation->set_rules('year', 'year', 'required|numeric');

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            
            if($this->form_validation->run() == false){
            $data['title'] = "Book List - Book Detail";
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('data/detail', $data);
            $this->load->view('maintemplate/footer', $data);
            }else{
            $this->data->edit($data);
            }
        }




        public function add(){

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $data['category'] = $this->db->get('category')->result_array();

            $this->form_validation->set_rules('title', 'Title', 'required|trim');
            $this->form_validation->set_rules('category', 'Category', 'required');
            $this->form_validation->set_rules('writer', 'writer', 'required|trim');
            $this->form_validation->set_rules('publisher', 'publisher', 'required|trim');
            $this->form_validation->set_rules('year', 'year', 'required|numeric');
            $this->form_validation->set_rules('ISBN', 'ISBN', 'required|numeric');



            if($this->form_validation->run() == false){
            $data['title'] = "Add Books";
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('data/add_books', $data);
            $this->load->view('maintemplate/footer', $data);
            }else{
                $this->data->input($data);
            }
        
        
        } 



        public function delete($id){
            $data['id'] = $id;
            $this->data->delete($data);
        }
        


        public function deletecat($id){
            $data['id'] = $id;
            $this->category->delete($data);
        }






        public function category(){


            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

            $data['cat'] = $this->db->get('category')->result_array();
            $data['title'] = "Category Management";

            $this->form_validation->set_rules('name', 'Name', 'required|trim');
            if($this->form_validation->run() == false){
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('data/cate', $data);
            $this->load->view('maintemplate/footer', $data);
            }else{
                if($this->input->post('id')){
                    $this->category->edit($data);
                }else{
                $this->category->input($data);}
            }
        }





        public function spread($id){

            //untuk memisahkan Id dari user yang mengupload data buku,
            //Agar hanya diperlukan 1 controller untuk mengakses profile User lain di Controler user/detail


            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();


            
            $query = "SELECT * FROM booklist 
            INNER JOIN category ON booklist.cat = category.id_cat
            INNER JOIN users ON booklist.uploader = users.email
            WHERE booklist.id_book = $id
            "; 
            $books =  $this->db->query($query)->row_array();
     
                $a = $this->db->get_where('users', ['email' => $books['uploader']])->row_array();
                $ida = $a['id'];
                redirect('user/detail/' . $ida);
            
        }


 
    }

?>