<?php

    //Fungsi yang akan digunakan untuk mengecek apakah user telah login. serta pengecekan role user
    function is_logged_in(){
        $ci = get_instance();
        if ( !$ci->session->userdata('email') ){
            redirect('home');
        }else{
            $role_id = $ci->session->userdata('role');
            $menu = $ci->uri->segment(1);

            $query = $ci->db->get_where('menu', ['menu' => $menu])->row_array();
            $menu_id = $query['id'];

            //perbandingan dalam tabel access, sebagai pembatas pada user sesuai Role idnya
            $useraccess = $ci->db->get_where('access', ['role_id' => $role_id, 'menu_id' => $menu_id]);

            //Jika URL yang coba user access tidak sesuai dengan hak aksesnya, Maka akan dilemparkan ke controller Home method blocked.
            if($useraccess->num_rows() < 1){
                redirect('home/blocked');
            }

        }
    }


    //fungsi untuk controller access management, Agar secara otomatis tercentang pada kotak yang disediakan.
    function check_access($role_id, $menu_id){
        $ci = get_instance();

        $ci->db->where('role_id', $role_id);
        $ci->db->where('menu_id', $menu_id);
        $result = $ci->db->get('access');

        if($result->num_rows() > 0){
            return "checked='checked'";
        }

    }

?>