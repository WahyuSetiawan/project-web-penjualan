<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {

	public function index()
	{
		$data['bank'] = $this->db->get('tbl_bank_pembayaran')->result();

		$tmp['content'] = $this->load->view('keranjang',$data , true);
		$this->load->view('template', $tmp);
	}

	public function add_keranjang()
	{

		$id_produk = $this->input->post('beli');
		$data_produk = $this->db->where('id_produk', $id_produk)->get('tbl_produk')->result();

		$data = array(
			'id'      => $id_produk,
			'qty'     => $this->input->post('qty'),
			'price'   => $data_produk[0]->harga_produk,
			'name'    => $data_produk[0]->nama_produk,
			'image'    => $data_produk[0]->gambar_1,
			'catatan' => $this->input->post('catatan_produk')
		);
		$this->cart->insert($data);
		redirect('','refresh');
	}

	public function cancel_cart($id)
	{
		$data = array(
			'rowid' => $id,
			'qty'   => 0
		);
		$this->cart->update($data);

		echo '<script language="javascript">';
		echo 'alert("Item Dihapus")';
		echo '</script>';
		echo '<script type="text/javascript">';    
		echo 'window.location.assign("'.site_url().'")'; 
		echo '</script>';
	}

	public function destroy_cart()
	{
		$this->cart->destroy();
	}

	public function cart_checkout()
	{
		$total_bayar = $this->cart->total() + $this->input->post('jongkir') ;

		$kode_unix_tagihan = rand(100,1000);
		$harga_fix_tagihan = substr($total_bayar, 0, -3) . $kode_unix_tagihan;

		$data_pesanan = array(
			'id_konsumen' =>  $this->session->userdata('id_konsumen'),
			'nama_penerima' => $this->input->post('nama_penerima'),
			'no_hp_penerima'=> $this->input->post('nohp'),
			'provinsi_penerima'=> $this->input->post('provinsi'),
			'kota_penerima'=> $this->input->post('kota'),
			'kode_pos'=>$this->input->post('kode_pos'),
			'jumlah_ongkir'=>$this->input->post('jongkir'),
			'total_bayar' => $harga_fix_tagihan,
			'alamat'=> $this->input->post('alamat'),
			'kurir'=> $this->input->post('kurir').' - '.$this->input->post('paket_pengiriman'),
			'kode_unix' => $kode_unix_tagihan,
			'tanggal_pesan' => date('Y-m-d'),
			'status_pesanan'=> 'Menunggu',
			'id_bank' => $this->input->post('bank')
		);
		$this->db->insert('tbl_pesanan', $data_pesanan);
		$id_pesanan =  $this->db->insert_id();

		foreach ($this->cart->contents() as $items) { 
			$keranjang = array(

				'id_pesanan' => $id_pesanan,
				'id_produk'=> $items['id'],
				'qty'=>$items['qty'],
				'catatan_produk' => $items['catatan']);
			$this->db->insert('tbl_detail_pesan', $keranjang);
		}
		$this->cart->destroy();
		redirect(site_url('akun/pesanan'),'refresh');

	}

}

/* End of file Order.php */
/* Location: ./application/controllers/admin/Order.php */