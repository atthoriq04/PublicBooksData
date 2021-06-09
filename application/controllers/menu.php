<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Menu extends CI_Controller {

        public function __construct(){
            parent::__construct();
            is_logged_in();
            $this->load->model('menu_sistem' , 'menu');	
        }

        public function index(){

            $data['menu'] = $this->db->get('menu')->result_array();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Menu Management";

            $this->form_validation->set_rules('name', 'Menu', 'required');
            if($this->form_validation->run() == false){
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('menu/menu', $data);
            $this->load->view('maintemplate/footer', $data);
            }else{
                if($this->input->post('id')){
                    $this->menu->edit($data);
                }else{
                    $this->menu->add();
                }
            }
        }


        public function delete($id){
            $this->menu->delete($id);
        }

        public function submenu(){

            $data['menu'] = $this->db->get('menu')->result_array();

            $data['submenu'] = $this->menu->getsubmenu();

            $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
            $data['title'] = "Submenu Management";

            
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('menuid', 'Menu', 'required');
            $this->form_validation->set_rules('url', 'url', 'required');
            $this->form_validation->set_rules('icon', 'icon', 'required');
            if($this->form_validation->run() == false){
            $this->load->view('maintemplate/header', $data);
            $this->load->view('maintemplate/sidebar', $data);
            $this->load->view('maintemplate/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('maintemplate/footer', $data);
            }else{
                if($this->input->post('id')){
                    $this->menu->editsub($data);
                }else{
                $this->menu->addsub();
                }
            }
        }


        public function subdelete($id){
            $this->menu->subdelete($id);
        }


    }