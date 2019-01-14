<?php

class MY_Controller extends CI_Controller
{
    public $data = [];

    public function __construct()
    {
        parent::__construct();

        $this->load->library('session');
        
        $data = $this->settingModel->get();

        foreach ($data as $key => $value) {
            $this->data['setting'][$value->setting] = $value;
        }

        $this->data['head']['setting'] = $this->data['setting'];
        $this->data['head']['session'] = $this->session;        
    }
}
