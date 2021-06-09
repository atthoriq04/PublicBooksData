<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class User_sistem extends CI_Model {
    
        public function edit($data){
            
        $name = $this->input->post('name');
        $email = $this->input->post('email');

        //if there's A PIC
        $upload = $_FILES['image']['name'];

        if($upload){
            $config['upload_path'] = './asset/img/profile';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']     = '120000';

            $this->load->library('upload', $config);

            if($this->upload->do_upload('image')){
                $oldimage = $data['user']['image'];
                if($oldimage != 'default.png'){
                    unlink(FCPATH . 'asset/img/profile/'. $oldimage);
                }

                $image = $this->upload->data('file_name');
                $this->db->set('image', $image);
            }else{
                echo $this->upload->display_errors();
            }

        }

        $this->db->set('username', $name);
        $this->db->where('email', $email);
        $this->db->update('users');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Account Edited
        </div>');
        redirect('user');
        }

        public function password(){
            
        }

        public function change($data){
            $cpassword = $this->input->post('currentpassword');
                $password = $this->input->post('password1');
                if(!password_verify($cpassword, $data['user']['password'])) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Worrg Current Password
                    </div>');
                        redirect('user/change'); 
                }else{
                    if($cpassword == $password){
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        New Password cannot be same as current password
                    </div>');
                        redirect('user/change'); 
                    }else{
                        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

                        $this->db->set('password', $passwordhash);
                        $this->db->where('email' , $data['user']['email']);
                        $this->db->update('users');

                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                        New Password saved
                    </div>');
                        redirect('user/change'); 
                    }

                }
        }
    }
    
?>