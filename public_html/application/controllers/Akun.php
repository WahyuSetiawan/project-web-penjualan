<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akun extends Frontend
{

    public function index()
    {
        $this->data['user'] = $this->konsumenModel->get(false, false, $this->session->userdata('id_konsumen'));

        $this->blade->view('akun', $this->data);
    }

    public function daftar()
    {
        $data = array(
            'nama_konsumen' => $this->input->post('namalengkap'),
            'email_konsumen' => $this->input->post('email'),
            'password_konsumen' => md5($this->input->post('password')),
            'no_hp_konsumen' => $this->input->post('nohp'),
        );

        $this->kosumenModel->put($data);

        $data_session = array(
            'email_konsumen' => $this->input->post('email'),
            'nama_konsumen' => $this->input->post('namalengkap'),
            'id_konsumen' => $this->db->insert_id(),
        );

        $this->session->set_userdata($data_session);
        redirect(site_url(), 'refresh');
    }

    public function ubah()
    {
        $pass = $this->input->post('password');

        if ($pass == '') {
            $data = array(
                'nama_konsumen' => $this->input->post('namalengkap'),
                'email_konsumen' => $this->input->post('email'),
                'no_hp_konsumen' => $this->input->post('nohp'),
            );
        } else {
            $data = array(
                'nama_konsumen' => $this->input->post('namalengkap'),
                'email_konsumen' => $this->input->post('email'),
                'password_konsumen' => md5($this->input->post('password')),
                'no_hp_konsumen' => $this->input->post('nohp'),
            );
        }

        $this->konsumenModel->update($this->session->userdata('id_konsumen'), $data);

        redirect(site_url(), 'refresh');
    }

    public function logout()
    {
        session_destroy();
        redirect(site_url(), 'refresh');
    }

    public function login()
    {

        $data = $this->konsumenModel->login(
            $this->input->post('email'),
            $this->input->post('password')
        );
        if ($data) {
            $data_session = array(
                'email_konsumen' => $data->email_konsumen,
                'nama_konsumen' => $data->nama_konsumen,
                'id_konsumen' => $data->id_konsumen,
            );
            $this->session->set_userdata($data_session);
            redirect(site_url(), 'refresh');
        } else {
            echo '<script language="javascript">';
            echo 'alert("Mohon Maaf, USERNAMA ATAU PASSWORD SALAH !!!!")';
            echo '</script>';
            echo '<script type="text/javascript">';
            echo 'window.location.assign("' . site_url() . '")';
            echo '</script>';
        }
    }

    public function pesanan()
    {
        // {
        //     $data['pesanan'] = $this->db->where('id_konsumen', $this->session->userdata('id_konsumen'))->order_by('id_pesanan', 'desc')->get('tbl_pesanan')->result();
        //     $tmp['content'] = $this->load->view('pesanan', $data, true);
        //     $this->load->view('template', $tmp);
        $this->data['pesanan'] = $this->pesananModel->get(false, false, false, ['id_konsumen', $this->session->userdata('id_konsumen')]);

        $this->blade->view('pesanan', $this->data);
    }

    public function konfirmasi($id)
    {
        $this->load->library('upload');
        $nmfile = "file_konfirmasi" . time();
        $config['upload_path'] = './uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width'] = '3000'; //lebar maksimum 1288 px
        $config['max_height'] = '3000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya

        $this->upload->initialize($config);
        if ($_FILES['pic']['name']) {
            if ($this->upload->do_upload('pic')) {
                $url = $this->upload->data();
                $data_produk = array(
                    'bukti_transfer' => 'uploads/' . $url['file_name'],
                    'status_pesanan' => 'Konfirmasi',
                );
                $this->db->where('id_pesanan', $id)->update('tbl_pesanan', $data_produk);
                redirect('akun/pesanan');
            }
        }
    }

    public function invoice($id)
    {
        $this->data['detail_pesan'] = $this->detailPesanModel->get(false, false, false, [
            "id_pesanan" => $id,
        ]);
        $this->data['pesanan'] = $this->pesananModel->get(false, false, false, [
            "id_pesanan" => $id,
        ]);

        $this->blade->view('invoice', $this->data);
    }

}

/* End of file Akun.php */
/* Location: ./application/controllers/Akun.php */
