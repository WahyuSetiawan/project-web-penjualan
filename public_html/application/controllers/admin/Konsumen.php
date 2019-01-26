<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {

	public function index()
	{
		$this->data['konsumen'] = $this->db->get('tbl_konsumen')->result();
		// $tmp['content'] = $this->load->view('admin/konsumen/index', $data ,true);
		// $this->load->view('admin/template',$tmp);	

		$this->blade->view("admin/konsumen/index", $this->data);
	}

	public function hapus($id)
	{
		$this->db->where('id_konsumen', $id)->delete('tbl_konsumen');
		redirect('admin/konsumen','refresh');
	}

}

/* End of file Konsumen.php */
/* Location: ./application/controllers/admin/Konsumen.php */