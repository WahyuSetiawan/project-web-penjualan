<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

    }

    public function index()
    {
        $this->blade->view('login');
    }

    public function login()
    {
        $cek = $this->adminModel->login($this->input->post('email'), $this->input->post('password'));
        if ($cek) {
            $array = array(
                'id_admin' => $cek->id_admin,
                'email_admin' => $cek->email_admin,
            );
            $this->session->set_userdata($array);
        }

        redirect('admin/home', 'refresh');
    }

}

/* End of file Login.php */
