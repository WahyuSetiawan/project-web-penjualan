<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends Admin
{

    public function index()
    {
        $this->data['supplier'] = $this->supplierModel->get();

        $this->blade->view('supplier/index', $this->data);
    }

    public function add()
    {
        $this->blade->view('supplier/tambah', $this->data);
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

                $result = $this->supplierModel->set($data);
            }
        }

        if ($result) {
            $this->session->set_flashdata('insert_success', 'Selamat penyimpanan data supplier telah berhasil');
        } else {
            $this->session->set_flashdata('insert_failed', 'Tidak berhasil menyimpan data supplier');
        }

        redirect('supplier');
    }

    public function edit($id)
    {
        $this->data['supplier'] = $this->supplierModel->get($id);

        $this->blade->view('supplier/tambah', $this->data);
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

                $result = $this->supplierModel->put($id, $data);
            }
        }

        if ($result) {
            $this->session->set_flashdata('update_success', 'Selamat penyimpanan data supplier telah berhasil');
        } else {
            $this->session->set_flashdata('update_failed', 'Tidak berhasil menyimpan data supplier');
        }

        redirect('supplier');
    }

    public function del($id)
    {
        $method = $this->input->post("_method");
        $result = false;

        $result = $this->supplierModel->del($id);

        if ($result) {
            $this->session->set_flashdata('delete_success', 'Behasil menghapus data supplier');
        } else {
            $this->session->set_flashdata('delete_failed', 'Tidak berhasil menghapus data supplier');
        }

        redirect('supplier');

    }

}

/* End of file Supplier.php */
