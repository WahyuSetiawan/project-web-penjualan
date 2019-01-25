<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends Frontend
{

    public function index()
    {
        $this->data['produk'] = $this->db
            ->select('*,tbl_produk_kategori.nama_kategori')
            ->join('tbl_produk_kategori', 'tbl_produk.id_kategori=tbl_produk_kategori.id_kategori')
            ->get('tbl_produk')->result();

        $data['produk'] = $this->db
            ->select('*,tbl_produk_kategori.nama_kategori')
            ->join('tbl_produk_kategori', 'tbl_produk.id_kategori=tbl_produk_kategori.id_kategori')
            ->get('tbl_produk')->result();

        // $tmp['content'] = $this->load->view('homepage', $data, true);
        // $this->load->view('template', $tmp);

        $this->blade->view("frontend/homepage", $this->data);

    }

    public function produk_list($offset = 0)
    {

        $this->data['categori'] = $this->db->get('tbl_produk_kategori')->result();
        $this->data['related'] = $this->db
            ->select('*,tbl_produk_kategori.nama_kategori')
            ->join('tbl_produk_kategori', 'tbl_produk.id_kategori=tbl_produk_kategori.id_kategori')
            ->order_by('rand()')
            ->limit(6)
            ->get('tbl_produk')->result();

        $page = $this->uri->segment(3);
        $limit = 12;
        if (!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;

        $num_rows = $this->db->get('tbl_produk')->num_rows();

        $this->data["paginator"] = $this->pagination($num_rows, $limit);
        $this->data['produk'] = $this->db->get('tbl_produk', $limit, $offset)->result();
        $this->data['content'] = $this->load->view('produk_list', $this->data, true);

        // $this->load->view('template', $tmp);

        $this->blade->view('frontend/produk_list', $this->data);
    }

    public function kategori($id_kategori = '', $offset = 0)
    {

        $this->data['categori'] = $this->db->get('tbl_produk_kategori')->result();
        $this->data['related'] = $this->db
            ->select('*,tbl_produk_kategori.nama_kategori')
            ->join('tbl_produk_kategori', 'tbl_produk.id_kategori=tbl_produk_kategori.id_kategori')
            ->order_by('rand()')
            ->limit(6)
            ->get('tbl_produk')->result();

        $page = $this->uri->segment(4);
        $limit = 12;
        if (!$page):
            $offset = 0;
        else:
            $offset = $page;
        endif;
        $num_rows = $this->db->where('id_kategori', $id_kategori)->get('tbl_produk')->num_rows();

        $this->data["paginator"] = $this->pagination($num_rows, $limit);

        $this->data['produk'] = $this->db->where('id_kategori', $id_kategori)->get('tbl_produk', $limit, $offset)->result();
        // $tmp['content'] = $this->load->view('produk_list', $data, true);
        // $this->load->view('template', $tmp);

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
        // $tmp['content'] = $this->load->view('detail', $data, true);
        // $this->load->view('template', $tmp);
    }
}
