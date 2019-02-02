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

        $this->blade->view('produk/index', $this->data);
    }

    public function add()
    {
        $this->data['kategori'] = $this->kategoriModel->get();

        $this->blade->view('produk/add', $this->data);
    }

    public function edit($id_produk)
    {
        $this->data['produk'] = $this->produkModel->get($id_produk);
        $this->data['kategori'] = $this->kategoriModel->get();

        $this->blade->view('produk/add', $this->data);
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

        redirect('produk', 'refresh');
    }

    public function ubah($id_produk)
    {
        $this->db->trans_begin();

        $gambar_tambahan = $this->convertFilesArray($_FILES['gambar_tambahan']);

        $tmp_pic_last = $this->input->post('pic_last');
        $tmp_pic_last_tmp = $this->input->post('pic_last_tmp');
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

        if ($this->input->post('kategori')) {
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

        if (isset($tmp_pic_last)) {
            foreach ($tmp_pic_last_tmp as $key => $value) {
                if (isset($tmp_pic_last[$key]) == false) {
                    unlink(FCPATH . $value);
                    $this->gambarProdukModel->del($key);
                }
            }
        }

        $this->db->trans_complete();

        if ($this->db->trans_status()) {
            $this->db->trans_commit();
            redirect('produk');
        } else {
            $this->db->trans_rollback();
            redirect('produk/edit/' . $id_produk);
        }
    }

    public function hapus($id_produk)
    {
        $this->db->where('id_produk', $id_produk);
        $this->db->delete('tbl_produk');
        redirect('produk', 'refresh');
    }

}

/* End of file Produk.php */
/* Location: ./application/controllers/Produk.php */
