<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_sistem extends CI_Model
{


    public function register()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => $this->input->post('email', true),
            'password' => password_hash($this->input->post('Password1'), PASSWORD_DEFAULT),
            'image' => 'default.png',
            'role_id' => 1,
            'date_created' => time()
        ];
        //memasukkan data pada 1 array. sebelum diinsert ke database

        $this->db->insert('users', $data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation! Your Account has been created. Please Login!
              </div>');
        redirect('home');
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else {
                    redirect('data');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                        Worng Password
                    </div>');
                redirect('home');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                You Arent Registered
              </div>');
            redirect('home');
        }
    }
}
