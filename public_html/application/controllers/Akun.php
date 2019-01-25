<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends Frontend {


	public function index()
	{
		$this->data['user'] = $this->db->where('id_konsumen', $this->session->userdata('id_konsumen'))->get('tbl_konsumen')->result();
		// $tmp['content'] = $this->load->view('akun',$data, true);
		// $this->load->view('template', $tmp);

		$this->blade->view('frontend/akun', $this->data);
	}

	public function daftar()
	{
		$data = array(
			'nama_konsumen' => $this->input->post('namalengkap'),
			'email_konsumen' => $this->input->post('email'),
			'password_konsumen' => md5($this->input->post('password')),
			'no_hp_konsumen' => $this->input->post('nohp')
		);
		$this->db->insert('tbl_konsumen', $data);

		$data_session = array(
			'email_konsumen' => $this->input->post('email'),
			'nama_konsumen' => $this->input->post('namalengkap'),
			'id_konsumen' => $this->db->insert_id()
		);
		
		$this->session->set_userdata( $data_session );
		redirect(site_url(),'refresh');
	}

	public function ubah()
	{
		$pass = $this->input->post('password');

		if ($pass == '') {
			$data = array(
				'nama_konsumen' => $this->input->post('namalengkap'),
				'email_konsumen' => $this->input->post('email'),
				'no_hp_konsumen' => $this->input->post('nohp')
			);
		}else{
			$data = array(
				'nama_konsumen' => $this->input->post('namalengkap'),
				'email_konsumen' => $this->input->post('email'),
				'password_konsumen' => md5($this->input->post('password')),
				'no_hp_konsumen' => $this->input->post('nohp')
			);
		}
		$this->db->where('id_konsumen', $this->session->userdata('id_konsumen'))->update('tbl_konsumen', $data);

		redirect(site_url(),'refresh');
	}

	public function logout()
	{
		session_destroy();
		redirect(site_url(),'refresh');
	}

	public function login()
	{
		$cek = $this->db->where(array('email_konsumen' => $this->input->post('email'), 'password_konsumen' => md5($this->input->post('password'))))->get('tbl_konsumen')->result();
		if ($cek) {
			$data_session = array(
				'email_konsumen' => $cek[0]->email_konsumen,
				'nama_konsumen' => $cek[0]->nama_konsumen,
				'id_konsumen' => $cek[0]->id_konsumen
			);
			$this->session->set_userdata( $data_session );
			redirect(site_url(),'refresh');
		}else{
			echo '<script language="javascript">';
			echo 'alert("Mohon Maaf, USERNAMA ATAU PASSWORD SALAH !!!!")';
			echo '</script>';
			echo '<script type="text/javascript">';    
			echo 'window.location.assign("'.site_url().'")'; 
			echo '</script>';
		}
	}

	public function pesanan()
	{
		$data['pesanan'] =  $this->db->where('id_konsumen', $this->session->userdata('id_konsumen'))->order_by('id_pesanan', 'desc')->get('tbl_pesanan')->result();
		$tmp['content'] = $this->load->view('pesanan',$data, true);
		$this->load->view('template', $tmp);
	}


	public function konfirmasi($id)
	{
		$this->load->library('upload');
		$nmfile = "file_konfirmasi".time();
        $config['upload_path'] = './uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width']  = '3000'; //lebar maksimum 1288 px
        $config['max_height']  = '3000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if($_FILES['pic']['name'])
        {
        	if ($this->upload->do_upload('pic'))
        	{
        		$url = $this->upload->data();
        		$data_produk = array(  
        			'bukti_transfer' => 'uploads/'.$url['file_name']      ,
        			'status_pesanan' => 'Konfirmasi'                           
        		);
        		$this->db->where('id_pesanan',$id)->update('tbl_pesanan', $data_produk);
        		redirect('akun/pesanan');
        	}
        }
    }

    public function invoice($id)
    {
    	$this->data['detail_pesan'] = $this->db->where('id_pesanan', $id)->join('tbl_produk', 'tbl_detail_pesan.id_produk = tbl_produk.id_produk')->get('tbl_detail_pesan')->result();
    	$this->data['pesanan'] = $this->db->where('id_pesanan', $id)->join('tbl_konsumen', 'tbl_pesanan.id_konsumen = tbl_konsumen.id_konsumen')->get('tbl_pesanan')->result();

		// $this->load->view('invoice', $data);
		$this->blade->view('frontend/invoice',$this->data);
    }

}

/* End of file Akun.php */
/* Location: ./application/controllers/Akun.php */