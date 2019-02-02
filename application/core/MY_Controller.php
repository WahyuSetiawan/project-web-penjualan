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

    public function convertFilesArray($files)
    {
        $files_result = [];

        foreach ($files['name'] as $key => $value) {
            $files_result[$key]['name'] = $files['name'][$key];
            $files_result[$key]['type'] = $files['type'][$key];
            $files_result[$key]['tmp_name'] = $files['tmp_name'][$key];
            $files_result[$key]['error'] = $files['error'][$key];
            $files_result[$key]['size'] = $files['size'][$key];
        }

        return $files_result;
    }
}
