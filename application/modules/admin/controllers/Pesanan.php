<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function index()
    {
        $data['pesanan'] = $this->db->order_by('id_pesanan', 'desc')->get('tbl_pesanan')->result();

        $this->blade->view("pesanan/index", $data);
    }

    public function proses($id)
    {
        // $this->db->where('id_pesanan', $id)->update('tbl_pesanan', array('resi_pengiriman' => $this->input->post('resi'), 'status_pesanan' => 'Dikonfirmasi'));

        $data = [
            'resi_pengiriman' => $this->input->post('resi'),
            'status_pesanan' => 'Dikonfirmasi',
        ];

        $this->pesananModel->put($id, $data);

        redirect('pesanan', 'refresh');
    }

    public function invoice($id)
    {
        $data['detail_pesan'] = $this->detailPesanModel->get(false, false, false, ['id_pesanan' => $id]);
        $data['pesanan'] = $this->pesananModel->get(false, false, false, ['id_pesanan' => $id]);

        $this->blade->view("pesanan/invoice", $data);
    }

    public function hapus($id)
    {
        $this->detailPesanModel->del($id);
        $this->pesananModel->del($id);

        redirect('pesanan', 'refresh');
    }

    public function edit($id)
    {
        $this->data['detail_pesan'] = $this->detailPesanModel->get(false, false, false, ['id_pesanan' => $id]);
        $this->data['produk'] = $this->produkModel->get();
        $this->data['pesanan'] = $this->pesananModel->get(false, false, $id);

        $this->blade->view("pesanan/edit", $this->data);
    }

    public function ubah($id)
    {
        $data = [
            'id_produk' => $this->input->post('id_produk'),
            'qty' => $this->input->post('qty'),
            'id_pesanan' => $id
        ];

        // $this->db->insert('tbl_detail_pesan', array('id_produk' => $this->input->post('id_produk'), 'qty' => $this->input->post('qty'), 'id_pesanan' => $id));

        $this->pesananModel->set($data);

        redirect('pesanan/edit/' . $id, 'refresh');
    }
}

/* End of file Pesanan.php */
/* Location: ./application/controllers/Pesanan.php */
 