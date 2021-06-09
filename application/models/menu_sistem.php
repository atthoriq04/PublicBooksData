<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Menu_sistem extends CI_Model {

        public function add(){
            $this->db->insert('menu', ['menu' => $this->input->post('name')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                New Menu Added
              </div>');
                redirect('menu');
        }

        public function edit($data){
          $datas = [
            'menu' => $this->input->post('name')
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('menu', $datas);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Congratulation! Category Has Been Edited!
          </div>');
        redirect('menu/');
        }

        public function delete($id){

            $this->db->where('id' , $id);
            $this->db->delete('menu');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu has been deleted successfully
          </div>');
          redirect('menu');
        }


        public function getsubmenu(){


            $query = "SELECT `submenu` . * , `menu` . `menu`
                    FROM `submenu` JOIN `menu`
                    ON `submenu` . `menu_id` = `menu` . `id`
                ";   

            return $this->db->query($query)->result_array();
        }


        public function addsub(){
          $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menuid'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
          ];
          $this->db->insert('submenu', $data);
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
          New submenu added successfully
        </div>');
          redirect('menu/submenu');
        }

        public function editsub(){
          $data = [
            'title' => $this->input->post('title'),
            'menu_id' => $this->input->post('menuid'),
            'url' => $this->input->post('url'),
            'icon' => $this->input->post('icon'),
            'is_active' => $this->input->post('is_active')
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('submenu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            New submenu Edited successfully
          </div>');
            redirect('menu/submenu');
        }

        


        public function subdelete($id){

            $this->db->where('id', $id);
            $this->db->delete('submenu');
            
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Submenu has been deleted successfully
          </div>');
          redirect('menu/submenu');
        }

    }


?> 