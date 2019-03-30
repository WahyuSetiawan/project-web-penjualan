<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pembelian extends Admin
{

    public function index()
    {
        $this->data['pembelian'] = $this->pembelianModel->get();

        $this->blade->view('pembelian/index', $this->data);
    }

    public function add()
    {
        $this->data['supplier'] = $this->supplierModel->get();
        $this->data['produk'] = $this->produkModel->get();

        $this->blade->view('pembelian/tambah', $this->data);
    }

    public function set()
    {
        $method = $this->input->post("_method");
        $result = false;

        if ($method !== null) {
            if ($method == "SET") {
                $data = [
                    'id_supplier' => $this->input->post('supplier'),
                    'id_produk' => $this->input->post('produk'),
                    'jumlah' => $this->input->post('jumlah'),
                    'nominal' => $this->input->post('nominal'),
                ];

                $result = $this->pembelianModel->set($data);
            }
        }

        if ($result) {
            $this->session->set_flashdata('insert_success', 'Selamat penyimpanan data pembelian telah berhasil');
        } else {
            $this->session->set_flashdata('insert_failed', 'Tidak berhasil menyimpan data pembelian');
        }

        redirect('pembelian');
    }

    public function edit($id)
    {
        $this->data['supplier'] = $this->supplierModel->get();
        $this->data['produk'] = $this->produkModel->get();
        $this->data['pembelian'] = $this->pembelianModel->get($id);

        $this->blade->view('pembelian/tambah', $this->data);
    }

    public function put($id)
    {
        $method = $this->input->post("_method");
        $result = false;

        if ($method !== null) {
            if ($method == "PUT") {
                $data = [
                    'id_supplier' => $this->input->post('supplier'),
                    'id_produk' => $this->input->post('produk'),
                    'jumlah' => $this->input->post('jumlah'),
                    'nominal' => $this->input->post('nominal'),
                ];

                $result = $this->pembelianModel->put($id, $data);
            }
        }

        if ($result) {
            $this->session->set_flashdata('update_success', 'Selamat penyimpanan data pembelian telah berhasil');
        } else {
            $this->session->set_flashdata('update_failed', 'Tidak berhasil menyimpan data pembelian');
        }

        redirect('pembelian');
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

        redirect('pembelian');

    }

}

/* End of file Pembelian.php */
