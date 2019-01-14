<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Pembelian extends CI_Controller {

public function index()
    {
        $this->data['pembelian'] = $this->pembelianModel->get();

        $this->blade->view('admin/pembelian/index', $this->data);
    }

    public function add()
    {
        $this->blade->view('admin/pembelian/tambah', $this->data);
    }

    public function set()
    {
        $method = $this->input->post("_method");
        $result = false;

        if ($method !== null) {
            if ($method == "SET") {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'telepon' => $this->input->post('telepon'),
                ];

                $result = $this->pembelianModel->set($data);
            }
        }

        if ($result) {
            $this->session->set_flashdata('insert_success', 'Selamat penyimpanan data pembelian telah berhasil');
        } else {
            $this->session->set_flashdata('insert_failed', 'Tidak berhasil menyimpan data pembelian');
        }

        redirect('admin/pembelian');
    }

    public function edit($id)
    {
        $this->data['pembelian'] = $this->pembelianModel->get($id);

        $this->blade->view('admin/pembelian/tambah', $this->data);
    }

    public function put($id)
    {
        $method = $this->input->post("_method");
        $result = false;

        if ($method !== null) {
            if ($method == "PUT") {
                $data = [
                    'nama' => $this->input->post('nama'),
                    'alamat' => $this->input->post('alamat'),
                    'telepon' => $this->input->post('telepon'),
                ];

                $result = $this->pembelianModel->put($id, $data);
            }
        }

        if ($result) {
            $this->session->set_flashdata('update_success', 'Selamat penyimpanan data pembelian telah berhasil');
        } else {
            $this->session->set_flashdata('update_failed', 'Tidak berhasil menyimpan data pembelian');
        }

        redirect('admin/pembelian');
    }

    public function del($id)
    {
        $method = $this->input->post("_method");
        $result = false;

        $result = $this->pembelianModel->del($id);

        if ($result) {
            $this->session->set_flashdata('delete_success', 'Behasil menghapus data pembelian');
        } else {
            $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data pembelian');
        }

        redirect('admin/pembelian');

    }

}

/* End of file Pembelian.php */
