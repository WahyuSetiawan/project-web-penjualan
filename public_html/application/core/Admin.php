<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends MY_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->data['flashdata'] = $this->session;
    }

    public function index()
    {

    }

    public function upload($_nama_file)
    {
        $config['upload_path'] = './uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width'] = '3000'; //lebar maksimum 1288 px
        $config['max_height'] = '3000'; //tinggi maksimu 768 px
        $config['file_name'] = $_nama_file; //nama yang terupload nantinya
        $config['create_thumb'] = false;
        $config['maintain_ratio'] = false;

        $_FILES['userFile']['name'] = $files['userFile']['name'][$i];
        $_FILES['userFile']['type'] = $files['userFile']['type'][$i];
        $_FILES['userFile']['tmp_name'] = $files['userFile']['tmp_name'][$i];
        $_FILES['userFile']['error'] = $files['userFile']['error'][$i];
        $_FILES['userFile']['size'] = $files['userFile']['size'][$i];

        $this->upload->initialize($config);
        return $this->upload->do_upload('userFile');
    }

}
