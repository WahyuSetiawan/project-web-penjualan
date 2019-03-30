<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konsumen extends CI_Controller {

	public function index()
	{
		$this->data['konsumen'] = $this->db->get('tbl_konsumen')->result();
		// $tmp['content'] = $this->load->view('konsumen/index', $data ,true);
		// $this->load->view('template',$tmp);	

		$this->blade->view("konsumen/index", $this->data);
	}

	public function hapus($id)
	{
		$this->db->where('id_konsumen', $id)->delete('tbl_konsumen');
		redirect('konsumen','refresh');
	}

}

/* End of file Konsumen.php */
/* Location: ./application/controllers/Konsumen.php */