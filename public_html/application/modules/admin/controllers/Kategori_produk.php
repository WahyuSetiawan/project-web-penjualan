<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_produk extends CI_Controller {

	public function index()
	{
		$data['kategori'] = $this->db->get('tbl_produk_kategori')->result();
		// $data['content'] = $this->load->view('kategori_produk/index',$data,true);
		// $this->load->view('template',$data);

		$this->blade->view('kategori_produk/index', $data);
	}

	public function tambah_produk()
	{
		// $data['content'] = $this->load->view('kategori_produk/tambah','',true);
		// $this->load->view('template',$data);

		$this->blade->view('kategori_produk/tambah');
	}

	public function hapus($id)
	{
		$this->db->where('id_kategori', $id)->delete('tbl_produk_kategori');
		redirect('kategori_produk','refresh');
	}

	public function simpan()
	{
		$this->db->insert('tbl_produk_kategori', array('nama_kategori' => $this->input->post('nama_kategori')));
		redirect('kategori_produk','refresh');
	}

}

/* End of file Kategori_produk.php */
/* Location: ./application/controllers/Kategori_produk.php */