<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends Admin
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

    public function add()
    {
        $this->data['kategori'] = $this->kategoriModel->get();

        $this->blade->view('admin/produk/add', $this->data);
    }

    public function edit($id_produk)
    {
        $this->data['produk'] = $this->produkModel->get($id_produk);
        $this->data['kategori'] = $this->kategoriModel->get();

        $this->blade->view('admin/produk/add', $this->data);
    }

    public function simpan()
    {
        $data = array();
        $filesCount = count($_FILES['gambar_tambahan']['name']);
        // var_dump($filesCount);die()
        $files = $_FILES;

        $nmfile = "file_u_" . time() . ".jpg";

        if ($this->upload($nmfile, $files['gambar_utama'])) {
            $data_produk = array(
                'nama_produk' => $this->input->post('nama'),
                'harga_produk' => $this->input->post('harga'),
                'stok_produk' => $this->input->post('stok'),
                'deskripsi_produk' => $this->input->post('deskripsi'),
                'gambar_utama' => "uploads/" . $nmfile,
            );

            $this->produkModel->set($data_produk);
            $id = $this->db->insert_id();

            foreach ($this->input->post("kategori") as $key => $value) {
                $this->detailKategoriModel->set([
                    'id_produk' => $id,
                    'id_kategori' => $key,
                ]);
            }

            foreach ($files['gambar_tambahan']['name'] as $i => $value) {
                $nmfile = "file_" . time() . $i . ".jpg";

                $f['name'] = $files['gambar_tambahan']['name'][$i];
                $f['type'] = $files['gambar_tambahan']['type'][$i];
                $f['tmp_name'] = $files['gambar_tambahan']['tmp_name'][$i];
                $f['error'] = $files['gambar_tambahan']['error'][$i];
                $f['size'] = $files['gambar_tambahan']['size'][$i];

                if ($this->upload($nmfile, $f)) {
                    $url = $this->upload->data();
                    $angka_nomer = $i + 1;

                    $this->gambarProdukModel->set([
                        'path' => "uploads/" . $nmfile,
                        'id_produk' => $id,
                    ]);

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

        // if ($filesCount >= 1) {
        //     $angka = 1;
        //     for ($i = 0; $i < $filesCount; $i++) {
        //         $nmfile = "file_" . time() . $i . ".jpg";

        //         // $config['upload_path'] = './uploads/'; //path folder
        //         // $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        //         // $config['max_size'] = '2048'; //maksimum besar file 2M
        //         // $config['max_width'] = '3000'; //lebar maksimum 1288 px
        //         // $config['max_height'] = '3000'; //tinggi maksimu 768 px
        //         // $config['file_name'] = $nmfile; //nama yang terupload nantinya
        //         // $config['create_thumb'] = false;
        //         // $config['maintain_ratio'] = false;

        //         // $_FILES['userFile']['name'] = $files['userFile']['name'][$i];
        //         // $_FILES['userFile']['type'] = $files['userFile']['type'][$i];
        //         // $_FILES['userFile']['tmp_name'] = $files['userFile']['tmp_name'][$i];
        //         // $_FILES['userFile']['error'] = $files['userFile']['error'][$i];
        //         // $_FILES['userFile']['size'] = $files['userFile']['size'][$i];

        //         // $this->upload->initialize($config);
        //         // if ($this->upload->do_upload('userFile')) {

        //         if ($this->upload($nmfile)) {
        //             $url = $this->upload->data();
        //             $angka_nomer = $i + $angka;
        //             $query = "update tbl_produk set gambar_" . $angka_nomer . "='uploads/" . $nmfile . "' where id_produk=$id";
        //             $this->db->query($query);
        //             $configer = array(
        //                 'image_library' => 'gd2',
        //                 'source_image' => $url['full_path'],
        //                 'maintain_ratio' => true,
        //                 'width' => 300,
        //                 'height' => 300,
        //             );
        //             $this->image_lib->clear();
        //             $this->image_lib->initialize($configer);
        //             $this->image_lib->resize();
        //         }

        //     }
        // }
        redirect('admin/produk', 'refresh');
    }

    public function ubah($id_produk)
    {
        $this->db->trans_begin();

        $gambar_tambahan = $this->convertFilesArray($_FILES['gambar_tambahan']);

        $tmp_pic_last = $this->input->post('pic_last');
        $tmp_kategori_last = $this->input->post("last_kategori");

        $last_data = $this->produkModel->get($id_produk);

        $namafile_gambar_utama_ubah = "file_u_" . time() . ".jpg";

        if (isset($_FILES['gambar_utama'])) {
            if ($this->upload($namafile_gambar_utama_ubah, $_FILES['gambar_utama'])) {
                $namafile_gambar_utama_ubah = "uploads/" . $namafile_gambar_utama_ubah;
            } else {
                $namafile_gambar_utama_ubah = $last_data->gambar_utama;
            }
        } else {
            $namafile_gambar_utama_ubah = $last_data->gambar_utama;
        }

        $data_produk = array(
            'nama_produk' => $this->input->post('nama'),
            'harga_produk' => $this->input->post('harga'),
            'stok_produk' => $this->input->post('stok'),
            'deskripsi_produk' => $this->input->post('deskripsi'),
            'gambar_utama' => $namafile_gambar_utama_ubah,
        );

        $this->produkModel->put($id_produk, $data_produk);

        foreach ($this->input->post('kategori') as $key => $value) {
            if (isset($tmp_kategori_last[$key])) {
                unset($tmp_kategori_last[$key]);
            } else {
                $this->detailKategoriModel->set([
                    'id_kategori' => $key,
                    'id_produk' => $id_produk,
                ]);
            }
        }

        if (isset($tmp_kategori_last)) {
            foreach ($tmp_kategori_last as $key => $value) {
                $this->detailKategoriModel->del(false, ['id_produk' => $id_produk, "id_kategori" => $key]);
            }
        }

        foreach ($gambar_tambahan as $key => $value) {
            if (isset($tmp_pic_last[$key])) {
                $nmfile = "file_" . time() . $key . ".jpg";

                if ($this->upload($nmfile, $value)) {
                    $data_update_image = [
                        "id_produk" => $id_produk,
                        "path" => "uploads/" . $nmfile,
                    ];

                    $this->gambarProdukModel->put($key, $data_update_image);
                }

                unset($tmp_pic_last[$key]);
            } else {
                $nmfile = "file_" . time() . $key . ".jpg";

                if ($this->upload($nmfile, $value)) {
                    $data_update_image = [
                        "id_produk" => $id_produk,
                        "path" => "uploads/" . $nmfile,
                    ];

                    $this->gambarProdukModel->set($data_update_image);
                }
            }
        }

        foreach ($tmp_pic_last as $key => $value) {
            unlink($value);
            $this->gambarProdukModel->del($key);
        }

        $this->db->trans_complete();

        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            redirect('admin/produk');
        } else {
            $this->db->trans_rollback();
            redirect('admin/produk/edit/' . $id_produk);
        }

        // if(isset($_FILES['gambar_utama'])){
        //     foreach ($this->input->post('pic_last') as $key => $value) {

        //     }
        // }

        // $this->load->library('upload');
        // $nmfile = "file_" . time();

        // // $config['upload_path'] = './uploads/'; //path folder
        // // $config['allowed_types'] = 'gif|jpg|png|jpeg|bmp'; //type yang dapat diakses bisa anda sesuaikan
        // // $config['max_size'] = '2048'; //maksimum besar file 2M
        // // $config['max_width'] = '3000'; //lebar maksimum 1288 px
        // // $config['max_height'] = '3000'; //tinggi maksimu 768 px
        // // $config['file_name'] = $nmfile; //nama yang terupload nantinya
        // // $this->upload->initialize($config);

        // // if ($this->upload->do_upload('userFile')) {
        // if ($this->upload($nmfile)) {
        //     $url = $this->upload->data();
        //     $data_produk = array(
        //         'nama_produk' => $this->input->post('nama'),
        //         'harga_produk' => $this->input->post('harga'),
        //         'stok_produk' => $this->input->post('stok'),
        //         'deskripsi_produk' => $this->input->post('deskripsi'),
        //         'id_kategori' => $this->input->post('kategori'),
        //         'gambar_1' => 'uploads/' . $url['file_name'],
        //     );
        //     $this->db->where('id_produk', $id_produk)->update('tbl_produk', $data_produk);
        // } else {
        //     $data_produk = array(
        //         'nama_produk' => $this->input->post('nama'),
        //         'harga_produk' => $this->input->post('harga'),
        //         'stok_produk' => $this->input->post('stok'),
        //         'deskripsi_produk' => $this->input->post('deskripsi'),
        //         'id_kategori' => $this->input->post('kategori'),
        //     );
        //     $this->db->where('id_produk', $id_produk)->update('tbl_produk', $data_produk);
        // }
        // redirect('admin/produk');
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
