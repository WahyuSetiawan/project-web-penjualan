<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['flashdata'] = $this->session;

        if ($this->session->userdata("id_admin") ===null) {
            $this->login();
        }
    }

    public function login()
    {
        redirect('admin/login', 'refresh');
    }

    public function upload($_nama_file, $files = false)
    {
        $this->load->library('upload');
        $this->load->library('image_lib');

        $config['upload_path'] = './uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width'] = '3000'; //lebar maksimum 1288 px
        $config['max_height'] = '3000'; //tinggi maksimu 768 px
        $config['file_name'] = $_nama_file; //nama yang terupload nantinya
        $config['create_thumb'] = false;
        $config['maintain_ratio'] = false;

        $_FILES['userFile']['name'] = $files['name'];
        $_FILES['userFile']['type'] = $files['type'];
        $_FILES['userFile']['tmp_name'] = $files['tmp_name'];
        $_FILES['userFile']['error'] = $files['error'];
        $_FILES['userFile']['size'] = $files['size'];

        $this->upload->initialize($config);
        return $this->upload->do_upload('userFile');
    }

}
