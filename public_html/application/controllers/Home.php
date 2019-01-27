<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Frontend
{

    public function index()
    {
        $this->data['produk'] = $this->produkModel->get();

        $this->blade->view("frontend/homepage", $this->data);

    }

    public function produk_list($offset = 0)
    {

        $this->data['categori'] = $this->kategoriModel->get();
        $this->data['related'] = $this->produkModel->get(false, 6, false, [], ['rand()']);

        $page = $this->uri->segment(3);
        $limit = 12;
        if (!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;

        $num_rows = $this->produkModel->count();

        $this->data["paginator"] = $this->pagination($num_rows, $limit);

        $this->data['produk'] = $this->produkModel->get(false, $limit, $offset);

        $this->blade->view('frontend/produk_list', $this->data);
    }

    public function kategori($id_kategori = '', $offset = 0)
    {

        $this->data['categori'] = $this->kategoriModel->get();
        $this->data['related'] = $this->produkModel->get(false, 6, false, [], ['rand()']);

        $page = $this->uri->segment(4);
        $limit = 12;
        if (!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;

        $num_rows = $this->produkModel->count(['id_kategori' => $id_kategori]);

        $this->data["paginator"] = $this->pagination($num_rows, $limit);

        $this->data['produk'] = $this->produkModel->get(false, $limit, $offset, ['id_kategori' => $id_kategori]);

        $this->blade->view('frontend/produk_list', $this->data);
    }

    public function detail($id_produk)
    {
        $this->data['produk'] = $this->db
            ->select('*,tbl_produk_kategori.nama_kategori')
            ->where('id_produk', $id_produk)
            ->join('tbl_produk_kategori', 'tbl_produk.id_kategori=tbl_produk_kategori.id_kategori')
            ->get('tbl_produk')->result();
        $this->data['related'] = $this->db
            ->select('*,tbl_produk_kategori.nama_kategori')
            ->join('tbl_produk_kategori', 'tbl_produk.id_kategori=tbl_produk_kategori.id_kategori')
            ->order_by('rand()')
            ->get('tbl_produk')->result();

        $this->blade->view('frontend/detail', $this->data);
    }
}
