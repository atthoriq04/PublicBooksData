<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class data_sistem extends CI_Model {
        
        public function get($limit , $start , $cari = null){ 
                if ($cari){
                    $this->db->like('title', $cari);
                    $this->db->or_like('nama_kategori' , $cari);
                    $this->db->or_like('username' , $cari);
                }
                $this->db->join('users' , 'booklist.uploader = users.email');
                $this->db->join('category' , 'booklist.cat = category.id_cat');
                return $this->db->get('booklist',$limit,$start)->result_array();
        }        

        public function getrow(){
            return $this->db->get('booklist')->num_rows();
        }
        
        public function input($data){

            //konfigurasi jika ada Foto yang diupload, Jika tidak ada, Maka Foto akan menjadi yang telah disediakan, yaitu Default.png
            if( $upload = $_FILES['image']['name']){
                if($upload){
                    $config['upload_path'] = './asset/img/books';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|jfif';
                    $config['max_size']     = '120000';
        
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('image')){
                        $image = $upload = $_FILES['image']['name'];
                    }else{
                        echo $this->upload->display_errors();
                    }
        
                }
        
            }else{
                $image = "default.png";
            }

            $datas = [
                'cat' => $this->input->post('category'),
                        'title' => $this->input->post('title'),
                        'uploader' => $data['user']['email'],
                        'penulis' => $this->input->post('writer'),
                        'penerbit' => $this->input->post('publisher'),
                        'tahunterbit' => $this->input->post('year'),
                        'ISBN' => $this->input->post('ISBN'),
                        'Foto' => $image,
                        'date' => time()
            ];

            $this->db->insert('booklist', $datas);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation! The Book Has been Added!
              </div>');
            redirect('data');
        
        }

        public function edit($data){

            //sama seperti di atas, Namun kali ini, ditambahkan fungsi untuk menghapus foto lama jika diedit, agar tidak ada penumpukkan gambar di folder.
            //Jika tidak ada prubahan pada Foto, Maka foto yang diupdate ke DB adalah foto yang sebelumnya ada sebelum di update
            if( $upload = $_FILES['image']['name']){
                if($upload){
                    $config['upload_path'] = './asset/img/books';
                    $config['allowed_types'] = 'gif|jpg|png|jpeg|jfif';
                    $config['max_size']     = '120000';
        
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('image')){


                        $oldimage = $data['books']['Foto'];
                        if($oldimage != 'default.png'){
                            unlink(FCPATH . 'asset/img/books/'. $oldimage);
                        }
                        $image = $upload = $_FILES['image']['name'];
                    }else{
                        echo $this->upload->display_errors();
                    }
        
                }
        
            }else{
                $image = $data['books']['Foto'];
            }

            $datas = [
                'cat' => $this->input->post('category'),
                        'title' => $this->input->post('title'),
                        'penulis' => $this->input->post('writer'),
                        'penerbit' => $this->input->post('publisher'),
                        'tahunterbit' => $this->input->post('year'),
                        'ISBN' => $this->input->post('ISBN'),
                        'Foto' => $image,
                        'date' => time()
            ];

            $this->db->where('id_book', $this->input->post('id'));
            $this->db->update('booklist', $datas);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation! The Book Has been Edited!
              </div>');
            redirect('data/detail/' . $this->input->post('id')); 
        }


        public function delete($data){

            $this->db->where('id_book', $data['id']);
            $this->db->delete('booklist');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
                Congratulation! The Book Has been Deleted Successfully!
              </div>');
            redirect('data'); 
        }


           
    
    }
    
?>