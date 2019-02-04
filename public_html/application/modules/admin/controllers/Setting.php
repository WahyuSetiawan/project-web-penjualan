<?php defined('BASEPATH') or exit('No direct script access allowed');

class Setting extends Admin
{
    public function index()
    {
        if ($this->input->post("set") !== null) {
            foreach ($this->input->post("setting") as $val => $setting) {
                $this->settingModel->update($val, $setting);
            }
        }

        $this->data["carousell"] = $this->carousellModel->get();

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
            } else {
                $this->session->set_flashdata('change_logo_failed', 'Berganti logo tidak berhasil !!!');
            }
        }

        redirect('admin/setting', 'refresh');
    }

    public function carousell()
    {
        echo "<pre>";
        /*

        persiapan variable yang akan digunakan untuk penyimpanan carousell ke dalam database

         */

        $files_new = $_FILES["file_new"];
        $files_new = $this->convertFilesArray($files_new);
        $title_new = $this->input->post("title_new");
        $sub_title_new = $this->input->post("sub_title_new");
        $content = $this->input->post("content_new");

        $path = $this->path_image . "/carousell/";

        $files_old = $_FILES['file'];
        $files_old = $this->convertFilesArray($files_old);
        $title = $this->input->post("title");
        $sub_title = $this->input->post("sub_title");
        $content = $this->input->post("content");

        $old_data_carousel = $this->carousellModel->get();

        var_dump($title);

        /*

        convert variable to insert or update method

         */

        foreach ($files_new as $key => $files) {
            $nama_file = "carousell_" . time() . $key . ".jpg";

            // if ($this->upload($path, $nama_file, $files)) {
            //     $data = [
            //         "title" => $title_new[$key],
            //         "sub_title" => $sub_title_new[$key],
            //         "content" => $content[$key],
            //         "img" => $path. $nama_file
            //     ];

            //  var_dump($data);

            //     // $this->carousellModel->set($data);
            // } else {

            // }
        }

        foreach ($old_data_carousel as $key => $value) {
            if (isset($title[$value->id_carousell])) {
                $data = [
                    "title" => $title[$value->id_carousell],
                    "sub_title" => $sub_title[$value->id_carousell],
                    "content" => $content[$value->id_carousell],
                ];

                if ($files_old[$value->id_carousell]["tmp_name"] == "") {
                    $data['img'] = $value->img;
                } else {
                    $nama_file = "carousell_" . time() . $key . ".jpg";

                    if ($this->upload("./" . $path, $nama_file, $files_old[$value->id_carousell])) {

                    }

                }
            } else {
                echo "tidak tersedia";
            }
        }

        // redirect('admin/setting','refresh');

    }
}
