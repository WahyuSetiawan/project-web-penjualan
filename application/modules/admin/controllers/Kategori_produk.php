<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kategori_produk extends Admin
{

    public function index()
    {
        $data['kategori'] = $this->db->get('tbl_produk_kategori')->result();

        $this->blade->view('kategori_produk/index', $data);
    }

    public function tambah_produk()
    {
        $this->blade->view('kategori_produk/tambah');
    }

    public function edit($id)
    {
        $this->data['data'] = $this->kategoriModel->get($id);

        $this->blade->view('kategori_produk/tambah', $this->data);
    }

    public function hapus($id)
    {
     $this->kategoriModel->del($id);
        redirect('admin/kategori_produk', 'refresh');
    }

    public function simpan()
    {
        $data = ['nama_kategori' => $this->input->post('nama_kategori')];

        $this->kategoriModel->set($data);

        redirect('admin/kategori_produk', 'refresh');
    }

    public function put($id)
    {
		$data = ['nama_kategori' => $this->input->post('nama_kategori')];
		$this->kategoriModel->put($id, $data);
		redirect('admin/kategori_produk', 'refresh');
    }

}

/* End of file Kategori_produk.php */
/* Location: ./application/controllers/Kategori_produk.php */
