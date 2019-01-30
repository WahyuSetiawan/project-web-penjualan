<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		// if ($this->session->userdata('id_admin')) {
		// 	$data['content'] = $this->load->view('admin/home','',true);
		// 	$this->load->view('admin/template',$data);

		// 	$this->blade->view('admin/home');
		// }else{
		// 	$this->load->view('admin/login');
		// }

		$this->blade->view('home');
		
	}

	public function login()
	{
		$cek = $this->db->where('email_admin', $this->input->post('email'), 'password_admin' , $this->input->post('password'))->get('tbl_admin')->result();
		if ($cek) {
			$array = array(
				'id_admin' => $cek[0]->id_admin,
				'email_admin' => $cek[0]->email_admin
			);
			$this->session->set_userdata( $array );
		}
		redirect('admin/home','refresh');
		
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/admin/Home.php */