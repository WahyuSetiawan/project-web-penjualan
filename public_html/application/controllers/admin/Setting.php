<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends Admin
{
    public function index()
    {
        if ($this->input->post("set") !== null) {
            foreach ($this->input->post("setting") as $val => $setting) {
                $this->settingModel->update($val, $setting);
            }
        }

        $this->blade->view('admin/setting/index', $this->data);
    }

}
