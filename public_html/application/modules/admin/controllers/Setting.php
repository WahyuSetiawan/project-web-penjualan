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

        $this->blade->view('setting/index', $this->data);
    }

    public function logo()
    {
        $files = $_FILES;

        if (isset($files["logo"])) {
            $gambar = $files["logo"];
            $path = $this->path_image . "asset/logo/";
            $nama_file = "logo.png";

            if ($this->upload("./" . $path, $nama_file, $gambar)) {
                $this->settingModel->update("logo", $path . $nama_file);
                $this->session->set_flashdata('change_logo_success', 'Berhasil menggantikan logo');
            }else{
                $this->session->set_flashdata('change_logo_failed', 'Berganti logo tidak berhasil !!!');
            }
        }
        redirect('admin/setting','refresh');
    }

}
