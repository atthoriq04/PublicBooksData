<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class About_sistem extends CI_Model {
        
        public function update(){


            $datas = [
                'Pesan' => $this->input->post('about')
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('about', $datas);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                About this Site Updated...
              </div>');
            redirect('about');
        
        }
    
    }
?>