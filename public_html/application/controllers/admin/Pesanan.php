<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function index()
    {
        $data['pesanan'] = $this->db->order_by('id_pesanan', 'desc')->get('tbl_pesanan')->result();

        $this->blade->view("admin/pesanan/index", $data);
    }

    public function proses($id)
    {
        // $this->db->where('id_pesanan', $id)->update('tbl_pesanan', array('resi_pengiriman' => $this->input->post('resi'), 'status_pesanan' => 'Dikonfirmasi'));

        $data = [
			'resi_pengiriman' => $this->input->post('resi'), 
			'status_pesanan' => 'Dikonfirmasi'
        ];

        $this->pesananModel->put($id, $data);

        redirect('admin/pesanan', 'refresh');
    }

    public function invoice($id)
    {
        $data['detail_pesan'] = $this->detailPesanModel->get(false, false, false, ['id_pesanan' => $id]);
        $data['pesanan'] = $this->pesananModel->get(false, false, false, ['id_pesanan' => $id]);

        $this->blade->view("admin/pesanan/invoice", $data);
    }

    public function hapus($id)
    {
        $this->detailPesanModel->del($id);
        $this->pesananModel->del($id);

        // $this->db->where('id_pesanan', $id);
        // $this->db->delete('tbl_detail_pesan');

        // $this->db->where('id_pesanan', $id);
        // $this->db->delete('tbl_pesanan');

        redirect('admin/pesanan', 'refresh');
    }

    public function edit($id)
    {
        $data['detail_pesan'] = $this->db->where('id_pesanan', $id)->join('tbl_produk', 'tbl_detail_pesan.id_produk = tbl_produk.id_produk')->get('tbl_detail_pesan')->result();
        $data['produk'] = $this->db->get('tbl_produk')->result();
        $data['pesanan'] = $this->db->where('id_pesanan', $id)->join('tbl_konsumen', 'tbl_pesanan.id_konsumen = tbl_konsumen.id_konsumen')->get('tbl_pesanan')->result();

        $this->blade->view("admin/pesanan/edit", $data);
    }

    public function ubah($id)
    {
        $this->db->insert('tbl_detail_pesan', array('id_produk' => $this->input->post('id_produk'), 'qty' => $this->input->post('qty'), 'id_pesanan' => $id));
        redirect('admin/pesanan/edit/' . $id, 'refresh');

    }
}

/* End of file Pesanan.php */
/* Location: ./application/controllers/admin/Pesanan.php */
