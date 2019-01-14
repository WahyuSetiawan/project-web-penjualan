<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'download'));
    }

    public function index()
    {
        $this->data['produk'] = $this->produkModel->get();

        $this->blade->view('admin/produk/index', $this->data);
    }

    public function tambah_produk()
    {
        $this->data['kategori'] = $this->kategoriModel->get();
        
        $this->blade->view('admin/produk/tambah_produk', $this->data);
    }

    public function edit($id_produk)
    {
        $this->data['produk'] = $this->produkModel->get($id_produk);
        $this->data['kategori'] = $this->kategoriModel->get();

        $this->blade->view('admin/produk/edit', $this->data);
    }

    public function simpan()
    {
        $this->load->library('upload');
        $this->load->library('image_lib');

        $data = array();
        $filesCount = count($_FILES['userFile']['name']);
        // var_dump($filesCount);die()
        $files = $_FILES;

        $data_produk = array(
            'nama_produk' => $this->input->post('nama'),
            'harga_produk' => $this->input->post('harga'),
            'stok_produk' => $this->input->post('stok'),
            'deskripsi_produk' => $this->input->post('deskripsi'),
            'id_kategori' => $this->input->post('kategori'),

        );
        $this->db->insert('tbl_produk', $data_produk);
        $id = $this->db->insert_id();

        if ($filesCount >= 1) {
            $angka = 1;
            for ($i = 0; $i < $filesCount; $i++) {
                $nmfile = "file_" . time() . $i . ".jpg";
                $config['upload_path'] = './uploads/'; //path folder
                $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
                $config['max_size'] = '2048'; //maksimum besar file 2M
                $config['max_width'] = '3000'; //lebar maksimum 1288 px
                $config['max_height'] = '3000'; //tinggi maksimu 768 px
                $config['file_name'] = $nmfile; //nama yang terupload nantinya
                $config['create_thumb'] = false;
                $config['maintain_ratio'] = false;
                $_FILES['userFile']['name'] = $files['userFile']['name'][$i];
                $_FILES['userFile']['type'] = $files['userFile']['type'][$i];
                $_FILES['userFile']['tmp_name'] = $files['userFile']['tmp_name'][$i];
                $_FILES['userFile']['error'] = $files['userFile']['error'][$i];
                $_FILES['userFile']['size'] = $files['userFile']['size'][$i];
                $this->upload->initialize($config);
                if ($this->upload->do_upload('userFile')) {
                    $url = $this->upload->data();
                    $angka_nomer = $i + $angka;
                    $query = "update tbl_produk set gambar_" . $angka_nomer . "='uploads/" . $nmfile . "' where id_produk=$id";
                    $this->db->query($query);
                    $configer = array(
                        'image_library' => 'gd2',
                        'source_image' => $url['full_path'],
                        'maintain_ratio' => true,
                        'width' => 300,
                        'height' => 300,
                    );
                    $this->image_lib->clear();
                    $this->image_lib->initialize($configer);
                    $this->image_lib->resize();
                }

            }
        }
        redirect('admin/produk', 'refresh');
    }

    public function ubah_simpan($id_produk)
    {
        $this->load->library('upload');
        $nmfile = "file_" . time();
        $config['upload_path'] = './uploads/'; //path folder
        $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        $config['max_size'] = '2048'; //maksimum besar file 2M
        $config['max_width'] = '3000'; //lebar maksimum 1288 px
        $config['max_height'] = '3000'; //tinggi maksimu 768 px
        $config['file_name'] = $nmfile; //nama yang terupload nantinya
        $this->upload->initialize($config);

        if ($this->upload->do_upload('userFile')) {
            $url = $this->upload->data();
            $data_produk = array(
                'nama_produk' => $this->input->post('nama'),
                'harga_produk' => $this->input->post('harga'),
                'stok_produk' => $this->input->post('stok'),
                'deskripsi_produk' => $this->input->post('deskripsi'),
                'id_kategori' => $this->input->post('kategori'),
                'gambar_1' => 'uploads/' . $url['file_name'],
            );
            $this->db->where('id_produk', $id_produk)->update('tbl_produk', $data_produk);
        } else {
            $data_produk = array(
                'nama_produk' => $this->input->post('nama'),
                'harga_produk' => $this->input->post('harga'),
                'stok_produk' => $this->input->post('stok'),
                'deskripsi_produk' => $this->input->post('deskripsi'),
                'id_kategori' => $this->input->post('kategori'),
            );
            $this->db->where('id_produk', $id_produk)->update('tbl_produk', $data_produk);
        }
        redirect('admin/produk');
    }

    public function hapus($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('tbl_produk');
        redirect('admin/produk', 'refresh');
    }

}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */
