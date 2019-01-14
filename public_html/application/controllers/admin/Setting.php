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
        $data = $this->settingModel->get();

        foreach ($data as $key => $value) {
            $this->data['setting'][$value->setting] = $value->value;
        }


        $this->blade->view('admin/setting/index', $this->data);

    }

}
