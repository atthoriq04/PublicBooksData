<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class category_sistem extends CI_Model {
        
        public function input($data){


            $datas = [
                'nama_kategori' => $this->input->post('name')
            ];

            $this->db->insert('category', $datas);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation! The New Category Has been Added!
              </div>');
            redirect('data/category');
        
        }


        public function delete($data){

            $this->db->where('id_cat', $data['id']);
            $this->db->delete('category');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation! Category Has been Deleted Successfully!
              </div>');
            redirect('data/category'); 
        }


        public function edit($data){


            $datas = [
                'nama_kategori' => $this->input->post('name')
            ];

            $this->db->where('id_cat', $this->input->post('id'));
            $this->db->update('category', $datas);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation! Category Has Been Edited!
              </div>');
            redirect('data/category');
        
        }
    
    }
?>